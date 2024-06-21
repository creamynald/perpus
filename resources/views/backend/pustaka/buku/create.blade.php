@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-book fa-fw me-1 text-muted"></i> Tambah Data Pustaka
                </h3>
            </div>
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-lg">
                        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="kategori_pustaka_id">Kategori</label>
                                        <select class="form-select" id="kategori_pustaka_id" name="kategori_pustaka_id">
                                            <option selected>...</option>
                                            @foreach ($kategori as $row)
                                                <option value="{{ $row->id }}"><span
                                                        class="opacity-50">{{ $row->kode_kategori_pustaka }}</span> -
                                                    {{ $row->nama_kategori_pustaka }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penulis_id">Penulis</label>
                                        <select class="form-select" id="penulis_id" name="penulis_id">
                                            <option selected>...</option>
                                            @foreach ($penulis as $row)
                                                <option value="{{ $row->id }}"><span
                                                        class="opacity-50">{{ $row->kode_penulis }}</span> -
                                                    {{ $row->nama_penulis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penerbit_id">Penerbit</label>
                                        <select class="form-select" id="penerbit_id" name="penerbit_id">
                                            <option selected>...</option>
                                            @foreach ($penerbit as $row)
                                                <option value="{{ $row->id }}"><span
                                                        class="opacity-50">{{ $row->kode_penerbit }}</span> -
                                                    {{ $row->nama_penerbit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="tahun">Tahun</label>
                                        <input type="text" class="form-control" id="tahun" name="tahun"
                                            placeholder="tahun">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="kode">Kode Pustaka</label>
                                        <input type="text" class="form-control" id="kode" name="kode"
                                            placeholder="kode">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="judul_pustaka">Judul Pustaka /
                                            Buku</label>
                                        <input type="text" class="form-control" id="judul_pustaka" name="judul_pustaka"
                                            placeholder="Judul">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="halaman">Halaman</label>
                                        <input type="text" class="form-control" id="halaman" name="halaman"
                                            placeholder="Jumlah Halaman">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="dimensi">Dimensi</label>
                                        <input type="text" class="form-control" id="dimensi" name="dimensi"
                                            placeholder="Dimensi">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="stok">Stok</label>
                                        <input type="text" class="form-control" id="stok" name="stok"
                                            placeholder="Stok / Jumlah Pustaka">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="rak">Rak</label>
                                        <input type="text" class="form-control" id="rak" name="rak"
                                            placeholder="Rak">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="gambar_pustaka">Gambar Pustaka / Sampul</label>
                                        <input class="form-control" type="file" id="gambar_pustaka">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-plus opacity-50 me-1"></i> Tambah Pustaka
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
