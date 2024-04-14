@extends('admin.layouts.main')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Setting Landing Page
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Setting</h3>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" name="formEditSetting" id="formEditSetting">
                                <div class="row row-cards">
                                    <input type="hidden" name="old_img" id="old_img" value="{{ $setting_web->logo }}">
                                    <div class="col-auto">
                                        <div class="mb-3">
                                            @if ($setting_web->logo)
                                                <img src="{{ asset('storage/landing_page/' . $setting_web->logo) }}"
                                                    alt="img-thumbnail" class="img-thumbnail" style="max-width: 100px">
                                            @else
                                                <img src="https://placehold.co/100x100" alt="img-thumbnail"
                                                    class="img-thumbnail">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Logo Website</label>
                                            <input type="file" class="form-control" id="logo" name="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Alternatif Logo</label>
                                            <input type="text" class="form-control" id="alt-logo" name="alt-logo"
                                                value="{{ $setting_web->alt_logo }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tentang Kami</label>
                                            <textarea name="about" class="form-control" id="about" cols="30" rows="3">{{ $setting_web->about }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Alamat Kantor</label>
                                            <textarea name="company-address" id="company-address" class="form-control" cols="30" rows="3">{{ $setting_web->company_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Google Maps</label>
                                            <textarea name="google-maps" id="google-maps" cols="30" rows="3" class="form-control">
                                                {{ $setting_web->google_maps }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">No Handphone</label>
                                            <input type="text" class="form-control" name="number_phone" id="number_phone"
                                                value="{{ $setting_web->number_phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Alamat Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ $setting_web->email }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="btnSimpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Social Media</h3>
                            <button class="btn btn-primary" id="btnModal" data-bs-toggle="modal"
                                data-bs-target="#modal-social-media">
                                Tambah Social Media
                            </button>
                        </div>
                        <table class="table table-striped card-table table-vcenter table-responsive"
                            id="table-social-medias">
                            <thead class="text-start">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Icon</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-social-media" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Tambah Social Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name-social-media" name="name-social-media">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon</label>
                        <input type="text" class="form-control" id="icon-social-media" name="icon-social-media">
                        <small class="form-hint">List Icon <a href="https://icons.getbootstrap.com/"
                                target="_blank">Social
                                Media</a></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link</label>
                        <input type="text" class="form-control" id="link-social-media" name="link-social-media">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSubmit"
                        data-bs-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
@endpush

@push('script')
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnSimpan').on('click', function(e) {
                var formData = new FormData($("#formEditSetting")[0]);
                formData.append('_method', 'PUT');

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.setting.update', $setting_web->id) }}",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: "success",
                                title: "Data berhasil disimpan",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = response.redirect;
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal disimnpan",
                                timer: 1500
                            });
                        }
                    }
                });

            });

            $("#table-social-medias").dataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('admin.social_media.index') }}",
                columns: [{
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "class_icon",
                        name: "class_icon",
                    },
                    {
                        data: "link",
                        name: "link",
                    },
                    {
                        data: "action",
                        name: "action",
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

            $('#btnSubmit').on('click', function(e) {
                e.preventDefault();

                const data = {
                    'name': $('#name-social-media').val(),
                    'icon': $('#icon-social-media').val(),
                    'link': $('#link-social-media').val(),
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.social_media.store') }}",
                    data: data,
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status) {
                            $('#name-social-media').val('')
                            $('#icon-social-media').val('')
                            $('#link-social-media').val('')
                            Swal.fire({
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#table-social-medias').DataTable().ajax.reload();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 1500
                            });
                        }
                    }
                });
            });

            $(document).on('click', '#btnDelete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = "{{ route('admin.social_media.destroy', ':id') }}".replace(':id', id);

                Swal.fire({
                    title: "Apakah anda yakin ingin menghapus?",
                    showCancelButton: true,
                    confirmButtonText: "Iya",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            success: function(response) {
                                if (response.status) {
                                    Swal.fire({
                                        icon: "success",
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });

                                } else if (response.status) {
                                    Swal.fire({
                                        icon: "error",
                                        title: response.message,
                                        timer: 1500
                                    });
                                }

                                $('#table-social-medias').DataTable().ajax.reload();
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            })

        });
    </script>
@endpush
