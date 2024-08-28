<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"></button>
    <div class="dropdown-menu">

        <a href="{{ url('pengaduan/' . $data->jenis_pengaduan . '/detail/' . $data->uuid) }}" class="dropdown-item"
            title="Detail"><i class="fa fa-eye"></i> Detail</a>

        @if (auth()->user()->can('pengaduan-edit'))
            <a href="{{ url('pengaduan/' . $data->jenis_pengaduan . '/edit/' . $data->uuid) }}" class="dropdown-item"
                title="Edit"><i class="lni lni-highlight-alt"></i> Edit</a>
        @endif
        @if (auth()->user()->can('pengaduan-delete'))
            <button class="dropdown-item hapus" pengaduan-name="{{ $data->judul }}" pengaduan-id="{{ $data->uuid }}"
                title="destroy"><i class="lni lni-trash"></i> Hapus</button>
        @endif

    </div>
</div>
