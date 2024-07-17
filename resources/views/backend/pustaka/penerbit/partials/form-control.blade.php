<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Table @yield('subTitle')</h3>
        <div class="block-options">
            <button type="submit" class="btn-block-option">
                <i class="fa fa-fw fa-check opacity-50"></i> {{ $submit }}
            </button>
            <a href="{{ route('penerbit.index') }}" class="btn-block-option">Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="kode_penerbit">Kode Penerbit</label>
                    <input type="text" class="form-control" id="kode_penerbit" name="kode_penerbit"
                        value="{{ old('kode_penerbit') ?? $penerbit->kode_penerbit }}" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="nama_penerbit">Nama Penerbit</label>
                    <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit"
                        value="{{ old('nama_penerbit') ?? $penerbit->nama_penerbit }}">
                </div>
            </div>
        </div>
    </div>
</div>