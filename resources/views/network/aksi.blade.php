<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"></button>
    <div class="dropdown-menu">

        <a href="{{ route('network.show', $data->uuid) }}" class="dropdown-item" title="Detail"><i class="fa fa-eye"></i>
            Detail</a>

        @if (auth()->user()->can('network-edit'))
            <a href="{{ route('network.edit', $data->uuid) }}" class="dropdown-item" title="Edit"><i
                    class="lni lni-highlight-alt"></i> Edit</a>
        @endif
        @if (auth()->user()->can('network-delete'))
            <button class="dropdown-item hapus" network-name="{{ $data->nama_aplikasi }}"
                network-id="{{ $data->uuid }}" title="Delete"><i class="lni lni-trash"></i> Hapus</button>
        @endif

    </div>
</div>
