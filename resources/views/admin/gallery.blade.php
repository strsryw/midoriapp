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

    <div class="my-3 p-3 card rounded shadow-sm">
        <h1 class="text-center my-3 p-3">Tambah Gallery</h1>
        <div class="card-body">
            <div class="mb-3 row">
                <div class="col-md-2 col-sm-12">
                    <label for="nama" class="form-label">Judul</label>
                </div>
                <div class="col-md-10 col-sm-12">
                    <input type="text" class="form-control" name='judul' id="judul">
                </div>
            </div>


            <div class="mb-3 row">
                <div class="col-md-2 col-sm-12">
                    <label for="foto" class="form-label">Foto</label>
                </div>
                <div class="col-md-10 col-sm-12">
                    <input class="form-control" type="file" id="foto">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-2 col-sm-12">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                </div>
                <div class="col-md-10 col-sm-12">
                    <textarea type="text" class="form-control" name='deskripsi' id="deskripsi"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-primary" name="button" onclick="simpanData()"><i
                        class="ti ti-device-floppy"></i>
                    Simpan</button>
            </div>
        </div>
    </div>
    <!-- AKHIR FORM -->

    <!-- START DATA -->
    <div class="my-3 p-3 card">
        <h1 class="text-center my-3 p-3">Daftar Gallery</h1>
        <div class="card-body">
            <!-- TOMBOL TAMBAH DATA -->
            {{-- <div class="pb-3">
                <button class="btn btn-primary" onclick="showModal()"><i class="ti ti-user-plus"></i>Tambah
                    Data</button>
            </div> --}}
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
                            <th class="text-center col-md-3">Foto</th>
                            <th class="text-center col-md-3">Deskripsi</th>
                            <th class="text-center col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Anton</td>
                            <td>anton@gmail.com</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning"><i class="ti ti-edit"></i></button>
                                <button type="button" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                            </td>
                        </tr>
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
    <!-- AKHIR DATA -->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <input type="hidden" id="tampungId">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama' id="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='email' id="email">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="insertData()" id="insertBtn">Save
                        changes</button>
                    <button type="button" class="btn btn-primary d-none" onclick="updateData()" id="updateBtn">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    {{-- <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src=" https://cdn.datatables.net/responsive/3.0.0/js/responsive.dataTables.js"></script>
    {{-- <script src="/js/script.js"></script> --}}
@endpush
