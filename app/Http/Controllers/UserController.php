<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use DataTables;

class UserController extends Controller
{
    function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::pluck('name', 'name')->all();
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['role'] = $input['roles'];
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['role'] = $input['roles'];
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function dataTable()
    {
        if (auth()->user()->role == 'superadmin') {
            $user = User::orderby('id', 'desc')->get();
        } else {
            $user = User::orderby('id', 'desc')->whereNotIn('role', ['superadmin'])->get();
        }


        return DataTables::of($user)
            ->addColumn('action', function ($user) {
                $edit = '<a href="' . route('users.edit', $user->id) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" user-name="' . $user->name . '" user-id="' . $user->id . '" title="Delete"><i class="lni lni-trash"></i></button>';
                if (auth()->user()->can('user-edit') and auth()->user()->can('user-delete')) {
                    return $edit . ' ' . $hapus;
                } elseif (auth()->user()->can('user-edit')) {
                    return $edit;
                } elseif (auth()->user()->can('user-delete')) {
                    return $hapus;
                } else {
                    return 'No Action';
                }
            })
            ->addColumn('nama_role', function ($user) {
                if (!empty($user->getRoleNames())) {
                    foreach ($user->getRoleNames() as $v) {
                        return '<span class="badge rounded-pill bg-primary">' . strtoupper($v) . '</span>';
                    }
                }
            })

            ->addColumn('nama', function ($user) {
                return '<img src="' . $user->getAvatarProfil() . '" alt="avatar" style="object-fit: cover; position: relative; width: 40px; height: 40px; overflow: hidden; border-radius: 50%;"> | ' . $user->name;
            })
            ->addColumn('status', function ($user) {
                if (auth()->user()->id == $user->id) {
                    return 'Aktif';
                } else {
                    if ($user->is_active == '1') {
                        return '<div class="form-check form-switch">
							    <input class="form-check-input change_status" id="Switch' . $user->id . '" data-id="' . $user->id . '" type="checkbox" checked>
								<label class="form-check-label" for="Switch' . $user->id . '" id="aktif' . $user->id . '">Aktif</label>
							</div>';
                    } else {
                        return '<div class="form-check form-switch">
								input class="form-check-input change_status" id="Switch' . $user->id . '" data-id="' . $user->id . '" type="checkbox">
								<label class="form-check-label" for="Switch' . $user->id . '" id="aktif' . $user->id . '">NonAktif</label>
							</div>';
                    }
                }
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'nama_role', 'status', 'nama'])
            ->make(true);
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_active = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
