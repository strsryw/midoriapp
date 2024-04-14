@extends('admin.layouts.main')

@push('css')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <!-- START FORM -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ $title }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-5 col-md-12 mb-3">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title text-center" id="titleForm">Tambah Galeri</h1>
                                </div>
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
                                    <div class="mb-3 row" id="rowRiviewImg">
                                        <div class="col-md-2 col-sm-12">

                                        </div>
                                        <div class="col-md-10 col-sm-12">
                                            <img src="https://placehold.co/300x200?text=RiviewImage" class="img-thumbnail"
                                                alt="Image" id="reviewImg" style="max-height: 200px; width:auto;">
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
                                </div>
                                <div class="card-footer">
                                    <div class="col-12 text-end">
                                        <button type="button" class="btn btn-primary d-none" id="btnUpdate" name="button"
                                            onclick="updateData()">
                                            <i class="ti ti-device-floppy"></i>
                                            Update
                                        </button>

                                        <button type="button" class="btn btn-primary" id="btnInsert" name="button">
                                            <i class="ti ti-device-floppy"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title">Data Galeri</h3>
                                </div>
                                <table class="table table-striped card-table table-vcenter table-responsive"
                                    id="table-galleries">
                                    <thead class="text-start">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Judul</th>
                                            <th>Foto</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR DATA -->
@endsection

@push('script')
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $("#table-galleries").dataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('admin.galeri.index') }}",
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
                        data: "limitDescription",
                        name: "Description",
                    },
                    {
                        data: "action",
                        name: "Action",
                    },
                ],
                language: {
                    lengthMenu: "Tampil _MENU_ data",
                    search: "Cari",
                    emptyTable: "Tidak ada data",
                    info: "Tampilkan _START_ ke _END_ dari _TOTAL_ data",
                },
                columnDefs: [{
                        width: '0%',
                        className: 'text-center',
                        targets: 0
                    },
                    {
                        width: '20%',
                        targets: 1
                    },
                    {
                        width: '20%',
                        targets: 2
                    },
                    {
                        width: '40%',
                        targets: 3
                    },
                    {
                        width: '20%',
                        targets: 4
                    }
                ],
                dom: `<"card-body border-bottom py-3"<"d-flex"<"text-secondary"l><"ms-auto text-secondary"<"ms-2 d-inline-block"f>>>><"table-responsive"t><"card-footer d-flex align-items-center"<"m-0 text-secondary"i><"pagination m-0 ms-auto"p>>>`,
            });
            $('#dt-length-1').removeClass('form-select-sm').addClass('form-select-md');
            $('#dt-search-1').removeClass('form-control-sm').addClass('form-control-md');

            $('#btnInsert').on('click', function(e) {
                e.preventDefault();

                var judul = document.getElementById("judul").value;
                var deskripsi = document.getElementById("deskripsi").value;
                var foto = document.getElementById("foto").files[0];
                var formData = new FormData();
                formData.append("judul", judul);
                formData.append("deskripsi", deskripsi);
                formData.append("foto", foto);

                $.ajax({
                    url: "{{ route('admin.galeri.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById('rowRiviewImg').classList.add('d-none');
                        $("#judul").val('');
                        $("#deskripsi").val('');
                        $('#foto').val('');
                        if (response.status) {
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
                        $('#table-galleries').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {

                    },
                });
            });

            $(document).on('click', '#btnEdit', function(e) {
                e.preventDefault();

                var id = $(this).data('id');
                var url = "{{ route('admin.galeri.edit', ':id') }}".replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        $('#rowRiviewImg').removeClass('d-none');
                        $('#btnInsert').addClass('d-none');
                        $('#btnUpdate').removeClass('d-none');
                        document.getElementById('reviewImg').style.display = 'block';
                        $('#idGallery').val(response.data.id);
                        $('#titleForm').text('Edit Galeri');
                        $('#judul').val(response.data.title);
                        $('#deskripsi').val(response.data.description);
                        $('#oldImage').val(response.data.image);
                        var reviewImg = $('#reviewImg').attr('src', '/storage/foto_gallery/' +
                            response.data
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
                });
            })

            $('#btnUpdate').on('click', function(e) {
                var id = $('#idGallery').val();
                var url = "{{ route('admin.galeri.update', ':id') }}".replace(':id', id);


                var formData = new FormData();
                formData.append('_method', 'PUT');
                formData.append('title', $('#judul').val());
                formData.append('description', $('#deskripsi').val());
                formData.append('oldImage', $('#oldImage').val());
                formData.append('image', document.getElementById("foto").files[0]);

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#titleForm').text('Tambah Galeri');
                        $("#judul").val('');
                        $('#foto').val('');
                        $('#reviewImg').attr('src',
                            `https://placehold.co/300x200?text=ReviewImage`);
                        $("#deskripsi").val('');
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
                        $('#table-galleries').DataTable().ajax.reload();
                    }
                });
            });

            $(document).on('click', '#btnDelete', function(e) {

                var id = $(this).data('id');
                var url = "{{ route('admin.galeri.destroy', ':id') }}".replace(':id', id);

                Swal.fire({
                    title: "Apakah anda yakin ingin menghapus ?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Iya",
                    denyButtonText: `Tidak`
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
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
                                $('#table-galleries').DataTable().ajax.reload();
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            });

            $('#foto').on('change', function(e) {
                e.preventDefault();
                selectFoto()
            });
        });

        function selectFoto() {
            var input = document.getElementById('foto');
            var img = document.getElementById('reviewImg');
            document.getElementById('rowRiviewImg').classList.remove('d-none');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
