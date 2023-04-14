@extends('layouts.master')
@section('title')
    Tambah Aplikasi
@endsection
@push('style')
@endpush

@push('script')
@endpush

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Tambah Aplikasi</h4>
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
                    <form action="{{ route('daftaraplikasi.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-forms.input_v id="name" type="text" name="name" label="Nama"
                                    isRequired="true" value="" isReadonly="" placeholder="Nama" />



                                <x-forms.select_v id="opd" name="opd" label="OPD" isRequired="true"
                                    isSelect2="false">
                                    <option value="" selected disabled>[Pilih]</option>
                                    @foreach ($opd as $list)
                                        <option value="{{ $list->nama_opd }}"
                                            {{ old('roles') == $list->nama_opd ? ' selected' : '' }}>
                                            {{ $list->nama_opd }} ({{ $list->singkatan }})</option>
                                    @endforeach
                                </x-forms.select_v>



                                <button type="submit" class="btn btn-primary"><i class="lni lni-save"></i> Submit</button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
