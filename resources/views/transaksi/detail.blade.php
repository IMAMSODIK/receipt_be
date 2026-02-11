@extends('layouts.template')

@section('own_style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>{{ $pageTitle }}</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('dashboard_assets/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-project border-b-primary border-2"><span class="f-light f-w-500 f-14">Detail
                            Transaction</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">Rp {{ number_format($totalAll, 0, ',', '.') }}</h2><span
                                    class="f-12 f-w-400">(All)</span>
                            </div>
                            <div class="product-sub bg-primary-light">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('dashboard_assets/assets/svg/icon-sprite.svg#color-swatch') }}">
                                    </use>
                                </svg>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-project border-b-info border-2"><span class="f-light f-w-500 f-14">Total
                            Transaction</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">Rp {{ number_format($totalMonth, 0, ',', '.') }}</h2><span
                                    class="f-12 f-w-400">(This month)</span>
                            </div>
                            <div class="product-sub bg-info-light">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('dashboard_assets/assets/svg/icon-sprite.svg#color-swatch') }}">
                                    </use>
                                </svg>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-project border-b-primary border-2"><span class="f-light f-w-500 f-14">Total
                            Transaction</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">Rp {{ number_format($totalToday, 0, ',', '.') }}</h2><span
                                    class="f-12 f-w-400">(Today)</span>
                            </div>
                            <div class="product-sub bg-primary-light">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('dashboard_assets/assets/svg/icon-sprite.svg#color-swatch') }}">
                                    </use>
                                </svg>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row size-column">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">

                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th width="60">No</th>
                                            <th>Order ID</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th class="text-end">Amount</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($transactions as $i => $t)
                                            <tr>
                                                <td class="text-center">{{ $i + 1 }}</td>
                                                <td>{{ $t['order_id'] }}</td>
                                                <td>{{ $t['created_at'] }}</td>
                                                <td class="text-center">
                                                    <span class="badge bg-success">
                                                        {{ $t['status'] }}
                                                    </span>
                                                </td>
                                                <td class="text-end fw-semibold">
                                                    Rp {{ number_format($t['amount'], 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('own_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let table = $("#basic-1").DataTable();
    </script>
@endsection
