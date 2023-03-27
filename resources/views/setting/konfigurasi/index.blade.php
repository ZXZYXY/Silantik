@extends('layouts.master')

@section('title')
    Konfigurasi Website
@endsection
@section('header')

@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h4 class="mb-3">Konfigurasi Web</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-{{ konfigurasi()->navbar_color }} card-outline">
                        <div class="card-header">
                            <h5 class="card-title">General</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('setting/konfigurasi/submit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $conf->id }}">
                                <x-forms.input_v id="nama_aplikasi" type="text" name="nama_aplikasi"
                                    label="Nama Aplikasi" isRequired="false" value="{{ $conf->nama_aplikasi }}"
                                    isReadonly="" placeholder="" />

                                <x-forms.input_v id="singkatan" type="text" name="singkatan" label="Singkatan"
                                    isRequired="false" value="{{ $conf->singkatan }}" isReadonly="" placeholder="" />

                                <x-forms.input_v id="keterangan_aplikasi" type="text" name="keterangan_aplikasi"
                                    label="Keterangan Aplikasi" isRequired="false" value="{{ $conf->keterangan_aplikasi }}"
                                    isReadonly="" placeholder="" />

                                <x-forms.input_v id="slogan" type="text" name="slogan" label="Slogan"
                                    isRequired="false" value="{{ $conf->slogan }}" isReadonly="" placeholder="" />

                                <x-forms.input_v id="tahun_pembuatan" type="text" name="tahun_pembuatan"
                                    label="Tahun Pembuatan" isRequired="false" value="{{ $conf->tahun_pembuatan }}"
                                    isReadonly="" placeholder="" />

                                <x-forms.input_v id="versi" type="text" name="versi" label="Versi"
                                    isRequired="false" value="" isReadonly="" placeholder=""
                                    value="{{ $conf->versi }}" />


                        </div>
                    </div>
                    <div class="card card-{{ konfigurasi()->navbar_color }} card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Meta</h5>
                        </div>

                        <div class="card-body">
                            <x-forms.textarea_v name="meta_deskripsi" id="meta_deskripsi" label="Meta Deskripsi"
                                isRequired="" value="{{ $conf->meta_deskripsi }}" />

                            <x-forms.textarea_v name="meta_keyword" id="meta_keyword" label="Meta Keyword" isRequired=""
                                value="{{ $conf->meta_keyword }}" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-{{ konfigurasi()->navbar_color }} card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Contact</h5>
                        </div>

                        <div class="card-body">
                            <x-forms.input_v id="email" type="email" name="email" label="Email" isRequired="false"
                                value="{{ $conf->email }}" isReadonly="" placeholder="" />

                            <x-forms.input_v id="no_telp" type="text" name="no_telp" label="No. Telepon"
                                isRequired="false" value="{{ $conf->no_telp }}" isReadonly="" placeholder="" />

                            <x-forms.input_v id="youtube" type="text" name="youtube" label="Youtube"
                                isRequired="false" value="{{ $conf->youtube }}" isReadonly="" placeholder="" />

                            <x-forms.input_v id="instagram" type="text" name="instagram" label="Instagram"
                                isRequired="false" value="{{ $conf->instagram }}" isReadonly="" placeholder="" />

                            <x-forms.input_v id="facebook" type="text" name="facebook" label="Facebook"
                                isRequired="false" value="{{ $conf->facebook }}" isReadonly="" placeholder="" />

                            <x-forms.textarea_v name="alamat" id="alamat" label="Alamat" isRequired=""
                                value="{{ $conf->alamat }}" />
                        </div>
                    </div>
                    <div class="card card-{{ konfigurasi()->navbar_color }} card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Warna Template</h5>
                        </div>

                        <div class="card-body">

                            <x-forms.input_v id="warna_template" type="text" name="warna_template"
                                label="Warna Template" isRequired="false" value="{{ $conf->warna_template }}"
                                isReadonly="" placeholder="" />
                            <div class="mb-3">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" name="mode" type="radio" value="dark"
                                        id="customRadio1" @if ($conf->mode == 'dark') checked @endif>
                                    <label for="customRadio1" class="custom-control-label">Dark Mode</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" name="mode" type="radio" value="light"
                                        id="customRadio2" @if ($conf->mode == 'light') checked @endif>
                                    <label for="customRadio2" class="custom-control-label">Light Mode</label>
                                </div>
                            </div>
                            <x-forms.select_v id="sidebar_color" name="sidebar_color" label="Warna Sidebar"
                                isRequired="false" isSelect2="false">
                                <option value="">[Pilih]</option>
                                <option value="primary" @if ($conf->sidebar_color == 'primary') selected @endif>primary
                                </option>
                                <option value="secondary" @if ($conf->sidebar_color == 'secondary') selected @endif>
                                    secondary
                                </option>
                                <option value="info" @if ($conf->sidebar_color == 'info') selected @endif>info
                                </option>
                                <option value="success" @if ($conf->sidebar_color == 'success') selected @endif>success
                                </option>
                                <option value="danger" @if ($conf->sidebar_color == 'danger') selected @endif>danger
                                </option>
                                <option value="indigo" @if ($conf->sidebar_color == 'indigo') selected @endif>indigo
                                </option>
                                <option value="purple" @if ($conf->sidebar_color == 'purple') selected @endif>purple
                                </option>
                                <option value="pink" @if ($conf->sidebar_color == 'pink') selected @endif>pink
                                </option>
                                <option value="navy" @if ($conf->sidebar_color == 'navy') selected @endif>navy
                                </option>
                                <option value="lightblue" @if ($conf->sidebar_color == 'lightblue') selected @endif>
                                    lightblue
                                </option>
                                <option value="teal" @if ($conf->sidebar_color == 'teal') selected @endif>teal
                                </option>
                                <option value="cyan" @if ($conf->sidebar_color == 'cyan') selected @endif>cyan
                                </option>
                                <option value="dark" @if ($conf->sidebar_color == 'dark') selected @endif>dark
                                </option>
                                <option value="gray" @if ($conf->sidebar_color == 'gray') selected @endif>gray
                                </option>
                                <option value="light" @if ($conf->sidebar_color == 'light') selected @endif>light
                                </option>
                                <option value="warning" @if ($conf->sidebar_color == 'warning') selected @endif>warning
                                </option>
                                <option value="white" @if ($conf->sidebar_color == 'white') selected @endif>white
                                </option>
                                <option value="orange" @if ($conf->sidebar_color == 'orange') selected @endif>orange
                                </option>
                            </x-forms.select_v>

                            <x-forms.select_v id="navbar_color" name="navbar_color" label="Warna Navbar"
                                isRequired="false" isSelect2="false">
                                <option value="">[Pilih]</option>
                                <option value="primary" @if ($conf->navbar_color == 'primary') selected @endif>primary
                                </option>
                                <option value="secondary" @if ($conf->navbar_color == 'secondary') selected @endif>
                                    secondary
                                </option>
                                <option value="info" @if ($conf->navbar_color == 'info') selected @endif>info
                                </option>
                                <option value="success" @if ($conf->navbar_color == 'success') selected @endif>success
                                </option>
                                <option value="danger" @if ($conf->navbar_color == 'danger') selected @endif>danger
                                </option>
                                <option value="indigo" @if ($conf->navbar_color == 'indigo') selected @endif>indigo
                                </option>
                                <option value="purple" @if ($conf->navbar_color == 'purple') selected @endif>purple
                                </option>
                                <option value="pink" @if ($conf->navbar_color == 'pink') selected @endif>pink
                                </option>
                                <option value="navy" @if ($conf->navbar_color == 'navy') selected @endif>navy
                                </option>
                                <option value="lightblue" @if ($conf->navbar_color == 'lightblue') selected @endif>
                                    lightblue
                                </option>
                                <option value="teal" @if ($conf->navbar_color == 'teal') selected @endif>teal
                                </option>
                                <option value="cyan" @if ($conf->navbar_color == 'cyan') selected @endif>cyan
                                </option>
                                <option value="dark" @if ($conf->navbar_color == 'dark') selected @endif>dark
                                </option>
                                <option value="gray" @if ($conf->navbar_color == 'gray') selected @endif>gray
                                </option>
                                <option value="light" @if ($conf->navbar_color == 'light') selected @endif>light
                                </option>
                                <option value="warning" @if ($conf->navbar_color == 'warning') selected @endif>warning
                                </option>
                                <option value="white" @if ($conf->navbar_color == 'white') selected @endif>white
                                </option>
                                <option value="orange" @if ($conf->navbar_color == 'orange') selected @endif>orange
                                </option>
                            </x-forms.select_v>

                            <x-forms.select_v id="brandlogo_color" name="brandlogo_color" label="Warna Brand Logo"
                                isRequired="false" isSelect2="false">
                                <option value="">[Pilih]</option>
                                <option value="primary" @if ($conf->brandlogo_color == 'primary') selected @endif>primary
                                </option>
                                <option value="secondary" @if ($conf->brandlogo_color == 'secondary') selected @endif>
                                    secondary
                                </option>
                                <option value="info" @if ($conf->brandlogo_color == 'info') selected @endif>info
                                </option>
                                <option value="success" @if ($conf->brandlogo_color == 'success') selected @endif>success
                                </option>
                                <option value="danger" @if ($conf->brandlogo_color == 'danger') selected @endif>danger
                                </option>
                                <option value="indigo" @if ($conf->brandlogo_color == 'indigo') selected @endif>indigo
                                </option>
                                <option value="purple" @if ($conf->brandlogo_color == 'purple') selected @endif>purple
                                </option>
                                <option value="pink" @if ($conf->brandlogo_color == 'pink') selected @endif>pink
                                </option>
                                <option value="navy" @if ($conf->brandlogo_color == 'navy') selected @endif>navy
                                </option>
                                <option value="lightblue" @if ($conf->brandlogo_color == 'lightblue') selected @endif>
                                    lightblue
                                </option>
                                <option value="teal" @if ($conf->brandlogo_color == 'teal') selected @endif>teal
                                </option>
                                <option value="cyan" @if ($conf->brandlogo_color == 'cyan') selected @endif>cyan
                                </option>
                                <option value="dark" @if ($conf->brandlogo_color == 'dark') selected @endif>dark
                                </option>
                                <option value="gray" @if ($conf->brandlogo_color == 'gray') selected @endif>gray
                                </option>
                                <option value="light" @if ($conf->brandlogo_color == 'light') selected @endif>light
                                </option>
                                <option value="warning" @if ($conf->brandlogo_color == 'warning') selected @endif>warning
                                </option>
                                <option value="white" @if ($conf->brandlogo_color == 'white') selected @endif>white
                                </option>
                                <option value="orange" @if ($conf->brandlogo_color == 'orange') selected @endif>orange
                                </option>
                            </x-forms.select_v>

                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i>
                                Simpan</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-{{ konfigurasi()->navbar_color }} card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Logo Aplikasi</h5>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <form action="{{ url('setting/konfigurasi/logo_aplikasi') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $conf->id }}">
                                        <div
                                            class="form-group mb-3 {{ $errors->has('logo_aplikasi') ? ' has-error' : '' }}">
                                            <p align="center"><img src="{{ $conf->getLogoApp() }}" width="250px">
                                            </p>
                                            <label class="form-label">Logo Aplikasi</label><br>
                                            <input type="file"
                                                class="form-control form-control-sm @error('logo_aplikasi') is-invalid @enderror"
                                                name="logo_aplikasi" id="logo_aplikasi" required />
                                            @if ($errors->has('logo_aplikasi'))
                                                <span class="text-danger">{{ $errors->first('logo_aplikasi') }}</span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block"><i
                                                class="fa fa-save"></i>
                                            Simpan</button>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ url('setting/konfigurasi/favicon') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $conf->id }}">
                                        <div class="form-group mb-3 {{ $errors->has('favicon') ? ' has-error' : '' }}">
                                            <p align="center"><img src="{{ $conf->getFavicon() }}" width="250px">
                                            </p>
                                            <label class="form-label">Favicon</label><br>
                                            <input type="file"
                                                class="form-control form-control-sm @error('favicon') is-invalid @enderror"
                                                name="favicon" id="favicon" required />
                                            @if ($errors->has('favicon'))
                                                <span class="text-danger">{{ $errors->first('favicon') }}</span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block"><i
                                                class="fa fa-save"></i>
                                            Simpan</button>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ url('setting/konfigurasi/logo_kecil') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $conf->id }}">
                                        <div class="form-group mb-3 {{ $errors->has('logo_kecil') ? ' has-error' : '' }}">

                                            <p align="center"><img src="{{ $conf->getLogoKecil() }}" width="250px">
                                            </p>
                                            <label class="form-label">Logo Kecil</label><br>
                                            <input type="file"
                                                class="form-control form-control-sm @error('logo_kecil') is-invalid @enderror"
                                                name="logo_kecil" id="logo_kecil" required />
                                            @if ($errors->has('logo_kecil'))
                                                <span class="text-danger">{{ $errors->first('logo_kecil') }}</span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block"><i
                                                class="fa fa-save"></i>
                                            Simpan</button>
                                    </form>
                                </div>

                                <div class="col-md-3">
                                    <form action="{{ url('setting/konfigurasi/gambar_sidebar') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $conf->id }}">
                                        <div
                                            class="form-group mb-3 {{ $errors->has('gambar_sidebar') ? ' has-error' : '' }}">

                                            <p align="center"><img src="{{ $conf->getGambarSidebar() }}" width="250px">
                                            </p>
                                            <label class="form-label">Gambar Sidebar</label><br>
                                            <input type="file"
                                                class="form-control form-control-sm @error('gambar_sidebar') is-invalid @enderror"
                                                name="gambar_sidebar" id="gambar_sidebar" required />
                                            @if ($errors->has('gambar_sidebar'))
                                                <span class="text-danger">{{ $errors->first('gambar_sidebar') }}</span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block"><i
                                                class="fa fa-save"></i>
                                            Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

            </div>
            <!-- /.row -->

        </div>
    </div>






@endsection
@section('footer')

@stop
