<div class="card mb-5">
    @if ($judul == null)
    @else
        <div class="card-header">
            <h3 class="card-title">{{ $judul }}</h3>
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
