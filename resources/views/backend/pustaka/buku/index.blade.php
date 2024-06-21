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
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-4">
                                    <label class="form-label" for="kategori">Kategori</label>
                                    <input type="text" class="form-control form-control-lg" id="kategori"
                                        name="kategori" value="...">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-4">
                                    <label class="form-label" for="penulis">Penulis</label>
                                    <input type="text" class="form-control form-control-lg" id="penulis" name="penulis"
                                        value="...">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-4">
                                    <label class="form-label" for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control form-control-lg" id="penerbit"
                                        name="penerbit" value="...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('buku.create') }}" type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-plus opacity-50 me-1"></i> Tambah Pustaka
                                </a>
                            </div>
                            <div class="col-6 text-end">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-search opacity-50 me-1"></i> Cari
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Property -->
                <div class="block block-rounded">
                    <div class="block-content p-0 overflow-hidden">
                        <a class="img-link" href="#">
                            <img class="img-fluid rounded-top"
                                src="https://static-cse.canva.com/blob/1427892/ColorfulIllustrationYoungAdultBookCover.jpg"
                                alt="">
                        </a>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row g-sm">
                            <div class="col">
                                <a class="btn btn-sm btn-primary w-100" href="#">
                                    Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Property -->
            </div>
        </div>
    </div>
@endsection
