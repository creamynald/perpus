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
                        <form action="{{ route('buku.index') }}" method="GET">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="kategori_pustaka_id">Kategori</label>
                                        <select class="form-select" id="kategori_pustaka_id" name="kategori">
                                            <option value="">pilih kategori</option>
                                            @foreach ($kategori as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama_kategori_pustaka }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penulis_id">Penulis</label>
                                        <select class="form-select" id="penulis_id" name="penulis">
                                            <option value="">pilih penulis</option>
                                            @foreach ($penulis as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama_penulis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <label class="form-label" for="penerbit_id">Penerbit</label>
                                        <select class="form-select" id="penerbit_id" name="penerbit">
                                            <option value="">pilih penerbit</option>
                                            @foreach ($penerbit as $row)
                                                <option value="{{ $row->id }}">{{ $row->nama_penerbit }}</option>
                                            @endforeach
                                        </select>
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
                <div class="col-md-3">
                    <div class="block block-rounded ribbon ribbon-modern ribbon-danger">
                        <div class="ribbon-box text-uppercase">
                            {{ $row->kategori ? $row->kategori->nama_kategori_pustaka : 'Unknown' }}
            background-image: url('{{ asset('assets/media/photos/bg-login.jpg') }}');
                        </div>
                        <div class="block-content p-0 overflow-hidden">
                            <a class="img-link" href="{{ route('buku.show', $row->id) }}">
                                <img class="img-fluid rounded-top" src="{{asset('assets/img/pustaka/'.$row->gambar_pustaka) }}"
                                    alt="{{ $row->judul_pustaka }}">
                            </a>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="row g-sm">
                                <div class="col-12 text-center">
                                    <h3 class="h5 font-w600">{{ $row->judul_pustaka }}</h3>
                                </div>
                                @role(['siswa', 'kepsek'])
                                    <div class="col-md p-2">
                                        <a class="btn btn-sm btn-primary w-100" href="{{ route('buku.show', $row->id) }}">Lihat</a>
                                    </div>
                                @endrole
                                @role(['admin', 'super admin'])
                                    <div class="col-md-6 p-2">
                                        <a class="btn btn-sm btn-primary w-100" href="{{ route('buku.edit', $row->id) }}">Edit</a>
                                    </div>
                                    <div class="col p-2">
                                        <form action="{{ route('buku.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger w-100">Hapus</button>
                                        </form>
                                    </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md">
                    <div class="block block-rounded ribbon ribbon-modern ribbon-danger">
                        <div class="ribbon-box-skew-y-1 text-uppercase text-center">Tidak Ada Data</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection