@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">

            <!-- Page Content -->
            <div class="content">
                <div class="row">
                    <!-- Row #1 -->
                    <div class="col-6 col-xl-3">
                        <a class="block block-rounded block-link-rotate text-end" href="javascript:void(0)">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="d-none d-sm-block">
                                    <i class="fa fa-exchange fa-2x opacity-25"></i>
                                </div>
                                <div class="text-end">
                                    <div class="fs-3 fw-semibold">{{ $totalPeminjaman }}</div>
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Total Peminjaman</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-xl-3">
                        <a class="block block-rounded block-link-rotate text-end" href="javascript:void(0)">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="d-none d-sm-block">
                                    <i class="fa fa-users fa-2x opacity-25"></i>
                                </div>
                                <div class="text-end">
                                    <div class="fs-3 fw-semibold">{{ $totalAnggota }}</div>
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Jumlah Anggota</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-xl-3">
                        <a class="block block-rounded block-link-rotate text-end" href="javascript:void(0)">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="d-none d-sm-block">
                                    <i class="fa fa-book fa-2x opacity-25"></i>
                                </div>
                                <div class="text-end">
                                    <div class="fs-3 fw-semibold">{{ $totalPustaka }}</div>
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Jumlah Pustaka</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-xl-3">
                        <a class="block block-rounded block-link-rotate text-end" href="javascript:void(0)">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="d-none d-sm-block">
                                    <i class="fa fa-rupiah-sign fa-2x opacity-25"></i>
                                </div>
                                <div class="text-end">
                                    <div class="fs-3 fw-semibold">{{ $totalDendaNonMoneter }}</div>
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Denda Non-Moneter</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- END Row #1 -->
                </div>
            </div>
        </div>
    @endsection
