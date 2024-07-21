<div class="block-options">
    @role(['admin', 'super admin'])
        <button type="submit" class="btn btn-sm btn-primary" onclick="window.location='{{ route('anggota.create') }}'">
            <i class="fa fa-plus opacity-50"></i> {{ $submit }}
        </button>
    @endrole
    <button type="button" class="btn btn-sm btn-outline-primary" " onclick="window.location='{{ URL::previous() }}'">
        <i class="fa fa-arrow-left opacity-50"></i> {{ $back }}
    </button>
</div>
