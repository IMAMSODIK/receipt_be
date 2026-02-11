@extends('layouts.template')

@section('own_style')
    <style>
        .box-transaction {
            transition: all 0.25s ease;
            border-radius: 12px;
        }

        .box-transaction:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            background: #fafafa;
        }
    </style>
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
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <div class="row size-column">
            <div class="col-xl-4 col-sm-6">
                <div class="card o-hidden small-widget">
                    <div class="card-body total-project border-b-primary border-2"><span class="f-light f-w-500 f-14">Total
                            Transaction</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ $totalPaid }}</h2><span class="f-12 f-w-400">(All)</span>
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
                                <h2 class="f-w-600">{{ $paidThisMonth }}</h2><span class="f-12 f-w-400">(This month)</span>
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
                                <h2 class="f-w-600">{{ $paidToday }}</h2><span class="f-12 f-w-400">(Today)</span>
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

                            @foreach ($boxes as $box)
                                <div class="col-md-3 mb-4 box-transaction" data-id="{{ $box->id }}"
                                    style="cursor: pointer">
                                    <a href="/transaksi/detail?box_id={{ $box->id }}"
                                        class="text-decoration-none text-dark">
                                        <div class="card shadow-sm h-100 text-center">

                                            {{-- Thumbnail default --}}
                                            <img src="{{ $box->image ? asset('storage/' . $box->image) : asset('own_assets/images/no_image.png') }}"
                                                class="card-img-top" style="height:200px; object-fit:cover;">

                                            <div class="card-body">

                                                <h5 class="card-title mb-2">
                                                    {{ $box->name }}
                                                </h5>

                                                <div class="text-success fw-bold fs-5">
                                                    Rp {{ number_format($box->total_amount ?? 0, 0, ',', '.') }}
                                                </div>

                                                <small class="text-muted">
                                                    Total Pendapatan
                                                </small>

                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahKamar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Box</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Box</label>
                        <input type="text" class="form-control" id="name" placeholder="Contoh: 101">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" id="store">Simpan</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditKamar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Box</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_id">

                    <div class="mb-3">
                        <label class="form-label">Nama Box</label>
                        <input type="text" id="edit_name" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" id="update">Update</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('own_script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#tableKamar').DataTable({
                responsive: true,
                autoWidth: false
            });

            $('#store').on('click', function() {

                let name = $('#name').val();

                $.ajax({
                    url: "/data-box/store",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name
                    },

                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        });

                        $('#modalTambahKamar').modal('hide');
                        $('#name').val("");

                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },

                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: xhr.responseJSON?.message ?? 'Terjadi kesalahan',
                        });
                    }
                });

            });

            $(document).on('click', '.edit', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "/data-box/edit",
                    data: {
                        id: id
                    },
                    type: "GET",
                    success: function(res) {

                        $('#edit_id').val(res.id);
                        $('#edit_name').val(res.name);

                        $('#modalEditKamar').modal('show');
                    },
                    error: function() {
                        Swal.fire("Error", "Gagal mengambil data", "error");
                    }
                });
            });

            $('#update').on('click', function() {

                let id = $('#edit_id').val();
                let name = $('#edit_name').val();

                $.ajax({
                    url: "/data-box/update",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: name,
                        id: id
                    },

                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        $('#modalEditKamar').modal('hide');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    },

                    error: function(xhr) {
                        Swal.fire("Gagal", xhr.responseJSON?.message ?? "Terjadi kesalahan",
                            "error");
                    }

                });

            });

            $(document).on('click', '.hapus', function() {

                let id = $(this).data('id');

                Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data kamar tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Hapus',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {

                        if (result.isConfirmed) {

                            $.ajax({
                                url: "/data-box/delete",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: id
                                },

                                success: function(response) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message,
                                        timer: 1500,
                                        showConfirmButton: false
                                    });

                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                },

                                error: function(xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: xhr.responseJSON?.message ??
                                            "Terjadi kesalahan"
                                    });
                                }
                            });

                        }

                    });

            });
        });
    </script>
@endsection
