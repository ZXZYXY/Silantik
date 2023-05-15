<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::orderBy('group', 'asc')->get();
        return view('permission.create', compact('permission'));
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
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);

        Permission::create([
            'name' => $request->input('name'),
            'guard_name' => $request->input('guard_name'),
        ]);

        return redirect()->route('permission.index')->with('success', 'Permission created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        $permissionPermissions = Permission::join("permission_has_permissions", "permission_has_permissions.permission_id", "=", "permissions.id")
            ->where("permission_has_permissions.permission_id", $id)
            ->get();

        return view('permission.show', compact('permission', 'permissionPermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('permission.edit', compact('permission'));
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
            'group' => 'required',
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->group = $request->input('group');
        $permission->name = $request->input('name');
        $permission->guard_name = $request->input('guard_name');
        $permission->save();

        return redirect()->route('permission.index')->with('success', 'Permission updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("permissions")->where('id', $id)->delete();
        return redirect()->route('permission.index')
            ->with('success', 'Permission deleted successfully');
    }

    public function dataTable()
    {
        $data = Permission::orderby('id', 'desc');

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . route('permission.edit', $data->id) . '" class="btn btn-warning btn-sm" title="Edit"><i class="lni lni-highlight-alt"></i></a>';
                $hapus = '<button class="btn btn-danger btn-sm hapus" permission-name="' . $data->name . '" permission-id="' . $data->id . '" title="Delete"><i class="lni lni-trash"></i></button>';
                return $edit . ' ' . $hapus;
            })


            ->addIndexColumn()
            ->rawColumns(['action', 'nama_permission', 'status', 'nama'])
            ->make(true);
    }
}
