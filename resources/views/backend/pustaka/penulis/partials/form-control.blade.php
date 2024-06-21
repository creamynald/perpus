<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Table @yield('subTitle')</h3>
        <div class="block-options">
            <button type="submit" class="btn-block-option">
                <i class="fa fa-fw fa-check opacity-50"></i> {{ $submit }}
            </button>
            <a href="{{ route('penulis.index') }}" class="btn-block-option">Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="kode_penulis">Kode Penulis</label>
                    <input type="text" class="form-control" id="kode_penulis" name="kode_penulis"
                        value="{{ old('kode_penulis') ?? $penulis->kode_penulis }}" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="nama_penulis">Nama Penulis</label>
                    <input type="text" class="form-control" id="nama_penulis" name="nama_penulis"
                        value="{{ old('nama_penulis') ?? $penulis->nama_penulis }}">
                </div>
            </div>
        </div>
    </div>
</div>
