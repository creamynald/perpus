@extends('backend.layouts.app')

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-book fa-fw me-1 text-muted"></i> Edit Data Pustaka
                </h3>
            </div>
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-lg">
                        <form action="{{ route('buku.update', $pustaka->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if (session('error'))
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: '{{ session('error') }}',
                                    })
                                </script>
                            @endif
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="kategori_pustaka_id">Kategori</label>
                                        <select class="form-select" id="kategori_pustaka_id" name="kategori_pustaka_id">
                                            <option value="">...</option>
                                            @foreach ($kategori as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $pustaka->kategori_pustaka_id ? 'selected' : '' }}>
                                                    <span class="opacity-50">{{ $row->kode_kategori_pustaka }}</span> -
                                                    {{ $row->nama_kategori_pustaka }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_pustaka_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penulis_id">Penulis</label>
                                        <select class="form-select" id="penulis_id" name="penulis_id">
                                            <option value="">...</option>
                                            @foreach ($penulis as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $pustaka->penulis_id ? 'selected' : '' }}>
                                                    <span class="opacity-50">{{ $row->kode_penulis }}</span> -
                                                    {{ $row->nama_penulis }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penulis_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penerbit_id">Penerbit</label>
                                        <select class="form-select" id="penerbit_id" name="penerbit_id">
                                            <option value="">...</option>
                                            @foreach ($penerbit as $row)
                                                <option value="{{ $row->id }}"
                                                    {{ $row->id == $pustaka->penerbit_id ? 'selected' : '' }}>
                                                    <span class="opacity-50">{{ $row->kode_penerbit }}</span> -
                                                    {{ $row->nama_penerbit }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penerbit_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="tahun">Tahun</label>
                                        <input type="text" class="form-control" id="tahun" name="tahun"
                                            value="{{ $pustaka->tahun }}" placeholder="tahun">
                                        @error('tahun')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="kode_pustaka">Kode Pustaka</label>
                                        <input type="text" class="form-control" id="kode_pustaka" name="kode_pustaka"
                                            value="{{ $pustaka->kode_pustaka }}" placeholder="kode">
                                        @error('kode_pustaka')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="judul_pustaka">Judul Pustaka /
                                            Buku</label>
                                        <input type="text" class="form-control" id="judul_pustaka" name="judul_pustaka"
                                            value="{{ $pustaka->judul_pustaka }}" placeholder="Judul">
                                        @error('judul_pustaka')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="halaman">Halaman</label>
                                        <input type="text" class="form-control" id="halaman" name="halaman"
                                            value="{{ $pustaka->halaman }}" placeholder="Jumlah Halaman">
                                        @error('halaman')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="stok">Stok</label>
                                        <input type="text" class="form-control" id="stok" name="stok"
                                            value="{{ $pustaka->stok }}" placeholder="Stok / Jumlah Pustaka">
                                        @error('stok')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold" for="rak">Rak</label>
                                        <input type="text" class="form-control" id="rak" name="rak"
                                            value="{{ $pustaka->rak }}" placeholder="Rak">
                                        @error('rak')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="gambar_pustaka">Gambar Pustaka / Sampul</label>
                                        <input class="form-control" type="file" id="gambar_pustaka"
                                            name="gambar_pustaka">
                                        @if ($pustaka->gambar_pustaka)
                                            <div class="mt-2">
                                                <img src="{{ asset('img/pustaka/' . $pustaka->gambar_pustaka) }}"
                                                    alt="Gambar Pustaka" class="img-fluid rounded-top"
                                                    style="max-width: 150px;">
                                            </div>
                                        @endif
                                        @error('gambar_pustaka')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-save opacity-50 me-1"></i> Simpan Perubahan
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
