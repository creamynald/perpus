@extends('backend.layouts.app')

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <!-- Page Content -->
            <div class="content">
                <div class="row">
                    <!-- Status Cards Row -->
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

                    @role(['admin', 'super admin'])
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
                        @elserole('siswa')
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-link-rotate text-end" href="javascript:void(0)">
                                <div
                                    class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                    <div class="d-none d-sm-block">
                                        <i class="fa fa-coins fa-2x opacity-25"></i>
                                    </div>
                                    <div class="text-end">
                                        <div class="fs-3 fw-semibold">{{ $pointSiswa }}</div>
                                        <div class="fs-sm fw-semibold text-uppercase text-muted">Total Point
                                            {{ Auth::user()->name }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endrole

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
                </div>

                <div class="row">
                    <!-- Chart Row -->
                    <div class="col-md-12">
                        <div class="block block-rounded">
                            <div class="block-header">
                                <h3 class="block-title">
                                    Grafik Total Transaksi Pustaka <small>(2024)</small>
                                </h3>
                            </div>
                            <div class="block-content p-1 bg-body-light">
                                <canvas id="js-chartjs-dashboard-status" style="height: 290px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('js-chartjs-dashboard-status').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                        'September', 'Oktober', 'November', 'Desember'
                    ],
                    datasets: [{
                            label: 'Diajukan',
                            data: @json($monthlyDiajukan),
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                            borderColor: 'rgba(255, 159, 64, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Dipinjam',
                            data: @json($monthlyDipinjam),
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Dikembalikan',
                            data: @json($monthlyDikembalikan),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Dibatalkan',
                            data: @json($monthlyDibatalkan),
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                // Format y-axis labels as integers
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : '';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
