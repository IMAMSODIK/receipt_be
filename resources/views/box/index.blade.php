@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h4>Daftar Box</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('dashboard_assets/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg></a></li>
                        <li class="breadcrumb-item active">Daftar Box</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row size-column">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3 d-flex justify-content-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKamar">
                            Tambah Data
                        </button>
                    </div>
                    <div class="row g-3">
                        @foreach ($data as $box)
                            <div class="col-md-4 col-lg-3">
                                <div class="card h-100 shadow-sm">

                                    <img src="{{ $box->image ? asset('storage/' . $box->image) : asset('own_assets/images/no_image.png') }}"
                                        class="card-img-top preview-image"
                                        data-img="{{ $box->image ? asset('storage/' . $box->image) : asset('own_assets/images/no_image.png') }}"
                                        style="height:200px; object-fit:cover; cursor:pointer;">


                                    <div class="card-body text-center">

                                        <h5 class="card-title mb-2">{{ $box->name }}</h5>

                                        @if ($box->status == 1)
                                            <span class="badge bg-success mb-2">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary mb-2">Tidak Aktif</span>
                                        @endif

                                        <div class="d-flex justify-content-center gap-2 mt-3">
                                            <button class="btn btn-sm btn-warning edit"
                                                data-id="{{ $box->id }}">Edit</button>

                                            <button class="btn btn-sm btn-danger hapus"
                                                data-id="{{ $box->id }}">Hapus</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahKamar">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Box</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Gambar Box</label>
                        <input type="file" class="form-control" id="image">
                    </div>

                    <div class="mb-3">
                        <img id="preview_edit" width="100%" class="mb-2" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Box</label>
                        <input type="text" class="form-control" id="name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pin Box</label>
                        <input type="text" class="form-control" id="pin">
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
                        <label class="form-label">Gambar Box</label>
                        <input type="file" class="form-control" id="edit_image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Box</label>
                        <input type="text" id="edit_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pin Box</label>
                        <input type="text" id="edit_pin" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary" id="update">Update</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="imagePreviewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">

                <div class="modal-body text-center">
                    <img id="modalPreviewImg" src="" class="img-fluid rounded shadow">
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

                let formData = new FormData();

                formData.append('_token', "{{ csrf_token() }}");
                formData.append('name', $('#name').val());
                formData.append('pin', $('#pin').val());

                let file = $('#image')[0].files[0];
                if (file) {
                    formData.append('image', file);
                }

                $.ajax({
                    url: "/data-box/store",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

                    success: function(response) {
                        Swal.fire('Berhasil', response.message, 'success');

                        $('#modalTambahKamar').modal('hide');

                        setTimeout(() => location.reload(), 1000);
                    },

                    error: function(xhr) {
                        Swal.fire('Gagal', xhr.responseJSON?.message ?? 'Error', 'error');
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
                        $('#preview_edit').attr('src', '/storage/' + res.image);

                        $('#modalEditKamar').modal('show');
                    },
                    error: function() {
                        Swal.fire("Error", "Gagal mengambil data", "error");
                    }
                });
            });

            $('#update').on('click', function() {

                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', $('#edit_id').val());
                formData.append('name', $('#edit_name').val());
                formData.append('pin', $('#edit_pin').val());

                let image = $('#edit_image')[0].files[0];
                if (image) {
                    formData.append('image', image);
                }

                $.ajax({
                    url: "/data-box/update",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,

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

        $(document).on('click', '.preview-image', function() {
            let img = $(this).data('img');

            $('#modalPreviewImg').attr('src', img);
            $('#imagePreviewModal').modal('show');
        });
    </script>
@endsection
