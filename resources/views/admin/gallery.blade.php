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
            <div class="my-3 p-3 card rounded shadow-sm">
                <h1 class="text-center my-3 p-3" id="titleForm">Tambah Gallery</h1>
                <div class="card-body">
                    <input type="hidden" name="idGallery" id="idGallery">
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
                            <input type="hidden" id="oldImage">
                            <input class="form-control" type="file" id="foto">
                        </div>
                    </div>
                    <div class="mb-3 row d-none" id="rowRiviewImg">
                        <div class="col-md-2 col-sm-12">

                        </div>
                        <div class="col-md-10 col-sm-12">
                            <img src="" class="img-thumbnail" alt="Image" id="reviewImg"
                                style="max-height: 300px; width:auto;">
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
                        <button type="button" class="btn btn-primary d-none" id="btnUpdate" name="button"
                            onclick="updateData()">
                            <i class="ti ti-device-floppy"></i>
                            Update
                        </button>

                        <button type="button" class="btn btn-primary" id="btnInsert" name="button" onclick="simpanData()">
                            <i class="ti ti-device-floppy"></i>
                            Simpan
                        </button>
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
        </div>
    </div>

    <!-- AKHIR DATA -->
@endsection
@push('script')
    <script
        src="
                                                                                                                                                                https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js
                                                                                                                                                                ">
    </script>
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
                ajax: "/admin/gallery/ajax",
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
                        name: "Image",
                    },
                    {
                        data: "description",
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

        function simpanData() {
            var judul = document.getElementById("judul").value;
            var deskripsi = document.getElementById("deskripsi").value;
            var foto = document.getElementById("foto").files[0]; // Mendapatkan file foto yang dipilih
            var formData = new FormData(); // Buat objek FormData
            formData.append("judul", judul);
            formData.append("deskripsi", deskripsi);
            formData.append("foto", foto);
            $.ajax({
                url: "/admin/gallery/ajax",
                type: "post",
                data: formData,
                contentType: false,
                processData: false, // Set processData menjadi false agar FormData tidak diproses secara otomatis
                success: function(response) {
                    $("#judul").val('');
                    $("#deskripsi").val('');
                    $('#foto').val('');
                    if (response.status == true) {
                        Swal.fire({
                            icon: "success",
                            title: "Data berhasil disimpan",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Data gagal disimnpan",
                            timer: 1500
                        });
                    }
                    // Tindakan setelah permintaan berhasil
                    $('#myTable').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    // Tindakan jika terjadi kesalahan
                },
            });
        }

        function editData(id) {
            $.ajax({
                url: '/admin/gallery/ajax/' + id + '/edit',
                type: 'get',
                success: function(response) {
                    $('#rowRiviewImg').removeClass('d-none');
                    $('#btnInsert').addClass('d-none');
                    $('#btnUpdate').removeClass('d-none');
                    document.getElementById('reviewImg').style.display = 'block';
                    $('#idGallery').val(response.data.id);
                    $('#titleForm').text('Edit Form');
                    $('#judul').val(response.data.title);
                    $('#deskripsi').val(response.data.description);
                    $('#oldImage').val(response.data.image);
                    var reviewImg = $('#reviewImg').attr('src', '/storage/fotogallery/' + response.data
                        .image);
                    $('#foto').change(function() {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#reviewImg').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(this.files[0]);
                            console.log($('#foto')[0].files[0]);
                        }
                    });
                }
            })
        }

        function updateData() {
            const id = $('#idGallery').val();

            var formData = new FormData();
            formData.append('id', id);
            formData.append('title', $('#judul').val());
            formData.append('description', $('#deskripsi').val());
            formData.append('oldImage', $('#oldImage').val());
            // if ($('#foto')[0].files[0]) {
            formData.append('image', document.getElementById("foto").files[0]);
            // } else {
            //     var image = $('#foto')[0].src;
            //     var result = image.split('/');
            //     var dataImg = result[8];
            //     formData.append('image', dataImg);
            // }

            $.ajax({
                url: "/admin/gallery/update",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $("#judul").val('');
                    $("#deskripsi").val('');
                    $('#foto').val('');
                    document.getElementById('reviewImg').style.display = 'none';
                    if (response.status == true) {
                        Swal.fire({
                            icon: "success",
                            title: "Data berhasil diupdate",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Data gagal diupdate",
                            timer: 1500
                        });
                    }
                    $('#myTable').DataTable().ajax.reload();
                }
            });
        }

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
                        url: '/admin/gallery/ajax/' + id,
                        type: 'delete',
                        data: {},
                        success: function(response) {
                            console.log(response);
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
