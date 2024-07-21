@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-book fa-fw me-1 text-muted"></i> Data Pustaka
                </h3>
            </div>
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-lg">
                        <form action="{{ route('buku.search') }}" method="GET">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="kategori">Kategori</label>
                                        <input type="text" class="form-control form-control-lg" id="kategori"
                                            name="kategori" value="{{ request('kategori') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penulis">Penulis</label>
                                        <input type="text" class="form-control form-control-lg" id="penulis"
                                            name="penulis" value="{{ request('penulis') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penerbit">Penerbit</label>
                                        <input type="text" class="form-control form-control-lg" id="penerbit"
                                            name="penerbit" value="{{ request('penerbit') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    @role(['admin', 'super admin'])
                                        <a href="{{ route('buku.create') }}" class="btn btn-alt-primary">
                                            <i class="fa fa-plus opacity-50 me-1"></i> Tambah Pustaka
                                        </a>
                                    @endrole
                                </div>
                                <div class="col-6 text-end">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-search opacity-50 me-1"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            @forelse ($pustaka as $row)
                <!-- Buku -->
                <div class="col-md-3">
                    <div class="block block-rounded ribbon ribbon-modern ribbon-danger">
                        <div class="ribbon-box text-uppercase">
                            {{ $row->kategori->nama_kategori_pustaka }}
                        </div>
                        <div class="block-content p-0 overflow-hidden">
                            <a class="img-link" href="{{ route('buku.show', $row->id) }}">
                                <img class="img-fluid rounded-top" src="{{ asset('img/pustaka/' . $row->gambar_pustaka) }}"
                                    alt="{{ $row->judul_pustaka }}">
                            </a>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm">
                                <div class="col-12 text-center">
                                    <h3 class="h5 font-w600">
                                        {{ $row->judul_pustaka }}
                                    </h3>
                                </div>
                                @role(['siswa', 'kepsek'])
                                    <div class="col-md p-2">
                                        <a class="btn btn-sm btn-primary w-100" href="{{ route('buku.show', $row->id) }}">
                                            Lihat
                                        </a>
                                    </div>
                                @endrole
                                @role(['admin', 'super admin'])
                                    <div class="col-md-6 p-2">
                                        <a class="btn btn-sm btn-primary w-100" href="{{ route('buku.edit', $row->id) }}">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="col p-2">
                                        <form action="{{ route('buku.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger w-100">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Buku -->
            @empty
                <div class="col-md-3">
                    <div class="block block-rounded ribbon ribbon-modern ribbon-danger">
                        <div class="ribbon-box-skew-y-1 text-uppercase">
                            Tidak Ada Data
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
