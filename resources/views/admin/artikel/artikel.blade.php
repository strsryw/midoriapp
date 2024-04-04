@extends('admin.layouts.main')

@push('css')
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.dataTables.css"> --}}
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
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Data Artikel</h3>
                            <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">
                                Tambah Artikel
                            </a>
                        </div>
                        <table class="table table-striped card-table table-vcenter table-responsive" id="table-articles">
                            <thead class="text-start">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Judul</th>
                                    <th>Thumbnail</th>
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

    <!-- AKHIR DATA -->
@endsection
@push('script')
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $("#table-articles").dataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('admin.artikel.index') }}",
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
        });

        $(document).on('click', 'btnDelete', function(e) {
            e.prevenDefault();

            var id = $(this).data('id');
            var url = "{{ route('admin.artikel.destroy', ['id' => ':id']) }}".replace(':id', id);

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
                            $('#table-articles').DataTable().ajax.reload();
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        })

        // function deleteData(id) {
        //     Swal.fire({
        //         title: "Apakah anda yakin ingin menghapus ?",
        //         showCancelButton: true,
        //         confirmButtonText: "Iya",
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 url: '/admin/artikel/' + id,
        //                 type: 'delete',
        //                 data: {},
        //                 success: function(response) {
        //                     if (response.status == '1') {
        //                         Swal.fire({
        //                             icon: "success",
        //                             title: "Data berhasil dihapus",
        //                             showConfirmButton: false,
        //                             timer: 1500
        //                         });

        //                     } else if (response.status = '0') {
        //                         Swal.fire({
        //                             icon: "error",
        //                             title: "Data gagal dihapus",
        //                             timer: 1500
        //                         });
        //                     }
        //                     $('#myTable').DataTable().ajax.reload();
        //                 }
        //             });
        //         } else if (result.isDenied) {
        //             Swal.fire("Changes are not saved", "", "info");
        //         }
        //     });
        // }
    </script>
@endpush
