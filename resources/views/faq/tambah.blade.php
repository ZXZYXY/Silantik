<x-modallg id="ShowTambah" title="Tambah FAQ">
    <i class="text-danger">* Wajib diisi</i>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('faq/tambah') }}" class="form-horizontal" method="POST">
        @csrf
        <x-forms.textarea_v id="pertanyaan" type="text" name="pertanyaan" label="Pertanyaan" isRequired="true"
            value="" isReadonly="" placeholder="Pertanyaan" />

        <x-forms.textarea_v id="jawaban" type="text" name="jawaban" label="Jawaban" isRequired="true"
            value="" isReadonly="" placeholder="Jawaban" />

        <x-forms.select_v id="kategori" name="kategori" label="Kategori" isRequired="true" isSelect2="false">
            <option value="">[Pilih]</option>
            <option value="Umum">Umum</option>
        </x-forms.select_v>

        <x-forms.select_v id="publish" name="publish" label="Publish" isRequired="true" isSelect2="false">
            <option value="">[Pilih]</option>
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </x-forms.select_v>

        <x-forms.input_v id="urutan" type="number" name="urutan" label="Urutan" isRequired="true" value=""
            isReadonly="" placeholder="Urutan" />
        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i>
            Simpan</button>

    </form>
</x-modallg>
