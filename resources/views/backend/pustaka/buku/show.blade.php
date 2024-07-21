@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="my-5 text-center">
            <h1 class="h3 fw-extrabold mb-1">
                {{ $pustaka->judul_pustaka }}
            </h1>
            <h2 class="fs-sm fw-medium text-muted mb-0">
                <i class="fa fa-tag me-1"></i> {{ $pustaka->kategori->nama_kategori_pustaka }}
            </h2>
        </div>
        <div class="block block-rounded block-fx-shadow">
            <div class="block-content p-0 bg-image"
                style="background-image: url('{{ asset('img/pustaka/' . $pustaka->gambar_pustaka) }}');">
                <div class="px-3 py-8 bg-black-50 text-center rounded-top">
                    @if ($pustaka->stok <= 0)
                        <span class="badge bg-danger text-uppercase fw-bold py-2 px-3">Semua buku telah dipinjam, coba lagi
                            nanti</span>
                    @elseif ($pustaka->stok == 1)
                        <span class="badge bg-warning text-uppercase fw-bold py-2 px-3">Stok Terakhir</span>
                    @else
                        <span class="badge bg-success text-uppercase fw-bold py-2 px-3">Tersedia</span>
                    @endif
                </div>
            </div>
            <div class="block-content bg-body-light">
                <div class="row py-2">
                    <div class="col-6 col-md-4">
                        <p>
                            <i class="fa fa-fw fa-clock opacity-50 me-1"></i>
                            <strong>{{ $pustaka->tahun }}</strong>
                        </p>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <i class="fa fa-fw fa-book opacity-50 me-1"></i>
                            <strong>{{ $pustaka->halaman }}</strong> Halaman
                        </p>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <i class="fa fa-fw fa-shopping-cart opacity-50 me-1"></i>
                            <strong>{{ $pustaka->stok }}</strong> Stok
                        </p>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <i class="fa fa-fw fa-building opacity-50 me-1"></i>
                            <strong>{{ $pustaka->penerbit->nama_penerbit }}</strong>
                        </p>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <i class="fa fa-fw fa-pencil opacity-50 me-1"></i> {{ $pustaka->penulis->nama_penulis }}
                        </p>
                    </div>
                    <div class="col-6 col-md-4">
                        <p>
                            <i class="fa fa-fw fa-tag opacity-50 me-1"></i>
                            <strong>{{ $pustaka->kategori->nama_kategori_pustaka }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full border-top d-flex justify-content-between align-items-center">
                <a class="btn btn-alt-danger" href="javascript:void(0)">
                    <i class="far fa-fw fa-heart"></i>
                </a>
                <a class="btn btn-alt-primary" href="{{ route('pinjam-buku.create') }}">
                    <i class="fa fa-book opacity-50 me-1"></i>
                    <span>Pinjam Buku</span>
                </a>
            </div>
        </div>
    </div>
@endsection
