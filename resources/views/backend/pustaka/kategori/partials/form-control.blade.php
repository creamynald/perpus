<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Table @yield('subTitle')</h3>
        <div class="block-options">
            <button type="submit" class="btn-block-option">
                <i class="fa fa-fw fa-check opacity-50"></i> {{ $submit }}
            </button>
            <a href="{{ route('kategori.index') }}" class="btn-block-option">Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="kode_kategori_pustaka">Kode Kategori</label>
                    <input type="text" class="form-control" id="kode_kategori_pustaka" name="kode_kategori_pustaka"
                        value="{{ old('kode_kategori_pustaka') ?? $kategori->kode_kategori_pustaka }}" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="nama_kategori_pustaka">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori_pustaka" name="nama_kategori_pustaka"
                        value="{{ old('nama_kategori_pustaka') ?? $kategori->nama_kategori_pustaka }}" autofocus>
                </div>
            </div>
        </div>
    </div>
</div>