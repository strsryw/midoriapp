@extends('admin.layouts.main')

@push('css')
    {{-- https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.css">

    <style>
        /* Override CSS Paging DataTables */
        .dataTables_paginate .paginate_button:hover {
            /* Tambahkan properti CSS sesuai dengan gaya Tabler */
            background-color: #007bff;
            color: #fff;
        }
    </style>
@endpush
@section('content')
    <!-- START FORM -->

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container">
            <div class="my-3 card">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h1 class="text-center my-3">Daftar Berita</h1>
                </div>
                <div class="card-body">
                    <!-- TOMBOL TAMBAH DATA -->
                    <div class="mb-4 mt-4">
                        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary"><i
                                class="ti ti-user-plus"></i>Tambah
                            Berita</a>
                    </div>
                    <div class="table-responsive p-1">
                        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="alert">
                            <i class="ti ti-checks"></i> <strong id="alertText">Data inserted successfully</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <table class="table table-striped table-bordered" id="myTable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center col-md-3">Judul</th>
                                    <th class="text-center col-md-3">Thumbnail</th>
                                    <th class="text-center col-md-3">Deskripsi</th>
                                    <th class="text-center col-md-2">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR DATA -->
@endsection
@push('script')
    {{-- <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src=" https://cdn.datatables.net/responsive/3.0.0/js/responsive.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $("#myTable").dataTable({
                responsive: true,
                rowReorder: {
                    selector: "td:nth-child(2)",
                },
                language: {
                    lengthMenu: "Tampil _MENU_ data",
                    search: "Cari",
                    emptyTable: "Tidak ada data",
                    info: "Tampilkan _START_ ke _END_ dari _TOTAL_ data",
                },
                processing: true,
                serverside: true,
                ajax: "{{ route('admin.berita.index') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "title",
                        name: "Title",
                    },
                    {
                        data: "image",
                        name: "Thumbnail",
                    },
                    {
                        data: "limitDescription",
                        name: "Description",
                    },
                    {
                        data: "action",
                        name: "Action",
                    },
                ],
            });
            $("#myTable_filter").addClass("pb-3");
            document.getElementById("dt-search-0").classList.remove("form-control-sm");
            document.getElementById("dt-length-0").classList.remove("form-select-sm");
        });


        function deleteData(id) {
            Swal.fire({
                title: "Apakah anda yakin ingin menghapus ?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Iya",
                denyButtonText: `Tidak`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/berita/' + id,
                        type: 'delete',
                        data: {},
                        success: function(response) {
                            if (response.status == '1') {
                                Swal.fire({
                                    icon: "success",
                                    title: "Data berhasil dihapus",
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                            } else if (response.status = '0') {
                                Swal.fire({
                                    icon: "error",
                                    title: "Data gagal dihapus",
                                    timer: 1500
                                });
                            }
                            $('#myTable').DataTable().ajax.reload();
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        }
    </script>
@endpush
