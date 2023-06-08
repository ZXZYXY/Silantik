@extends('layouts.master')
@section('title')
    Edit Anggota Team
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Edit Anggota Team</h4>
                    <hr>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('team.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-8">
                                <x-forms.input_v id="nama" type="text" name="nama" label="Nama"
                                    isRequired="true" value="{{ $data->nama }}" isReadonly="" placeholder="Nama" />

                                <x-forms.input_v id="jabatan" type="text" name="jabatan" label="Jabatan"
                                    isRequired="true" value="{{ $data->jabatan }}" isReadonly="" placeholder="Jabatan" />

                                <x-forms.input_v id="foto" type="file" name="foto" label="Foto"
                                    isRequired="false" value="" isReadonly="" placeholder="Foto">
                                    <p class="m-2">
                                        <a href="{{ $data->getImageTeam() }}" target="_blank"><img
                                                src="{{ $data->getImageTeam() }}" width="100px"></a>
                                    </p>
                                </x-forms.input_v>


                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                    Submit</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
@endsection
