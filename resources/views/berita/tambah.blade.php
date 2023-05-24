@extends('layouts.master')
@section('title')
    Tambah Berita
@endsection
@push('style')
@endpush

@push('script')
    <script src="{{ asset('theme') }}/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: 'textarea#isi',
            menubar: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | link image | help',
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document
                    .getElementsByTagName(
                        'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        };

        tinymce.init(editor_config);
    </script>
@endpush

@section('content')
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <button class="btn btn-primary btn-sm mb-3" onclick="window.history.back();"><i class="fa fa-reply"></i>
                Kembali</button>
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Tambah Berita</h4>
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
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <x-forms.input_v id="judul" type="text" name="judul" label="Judul Berita"
                                    isRequired="true" value="" isReadonly="" placeholder="Judul Berita" />

                                <x-forms.select_v id="kategori_id" name="kategori_id" label="Kategori" isRequired="true"
                                    isSelect2="false">
                                    <option value="">[Pilih]</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}"
                                            {{ old('kategori_id') == $k->id ? ' selected' : '' }}>
                                            {{ $k->nama_kategori }}</option>
                                    @endforeach
                                </x-forms.select_v>

                                <x-forms.select_v id="published" name="published" label="Status" isRequired="true"
                                    isSelect2="false">
                                    <option value="">[Pilih]</option>
                                    <option value="1" {{ old('published') == '1' ? ' selected' : '' }}>
                                        Aktif</option>
                                    <option value="0" {{ old('published') == '0' ? ' selected' : '' }}>
                                        Non
                                        Aktif</option>
                                </x-forms.select_v>

                                <x-forms.textarea_v id="isi" type="text" name="isi" label="Isi Berita"
                                    isRequired="true" value="" isReadonly="" />


                            </div>
                            <div class="col-md-4">


                                <x-forms.input_v id="gambar" type="file" name="gambar" label="Cover"
                                    isRequired="true" placeholder="" value="" isReadonly="" />


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
