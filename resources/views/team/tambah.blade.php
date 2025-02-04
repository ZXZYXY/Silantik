@extends('layouts.master')
@section('title')
    Tambah Anggota Team
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
                    <h4 class="mb-0">Tambah Anggota Team</h4>
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
                    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.input_v id="nama" type="text" name="nama" label="Nama"
                                    isRequired="true" value="" isReadonly="" placeholder="Nama" />

                                <x-forms.select_v id="jabatan_id" name="jabatan_id" label="Jabatan" isRequired="true"
                                    isSelect2="true">
                                    <option value="">[Pilih]</option>
                                    @foreach ($jabatan as $list)
                                        <option value="{{ $list->id }}"
                                            {{ old('jabatan_id') == $list->id ? ' selected' : '' }}>
                                            {{ $list->nama_jabatan }}</option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.input_v id="foto" type="file" name="foto" label="Foto"
                                    isRequired="false" value="" isReadonly="" placeholder="Foto" />

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
