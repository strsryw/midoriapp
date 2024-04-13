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
                            <div class="row row-cards">
                                <input type="hidden" name="id_setting" id="id_setting" value="{{ $setting_web->id }}">
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
                                        <input type="file" class="form-control" id="logo" name="logo"
                                            value="{{ $setting_web->alt_logo }}">
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
                            <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">
                                Tambah Social Media
                            </a>
                        </div>
                        <table class="table table-striped card-table table-vcenter table-responsive"
                            id="table-social-media">
                            <thead class="text-start">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Icon</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('script')
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            // $("#table-articles").dataTable({
            //     processing: true,
            //     serverside: true,
            //     ajax: "{{ route('admin.setting.index') }}",
            //     columns: [{
            //             data: "DT_RowIndex",
            //             name: "DT_RowIndex",
            //             orderable: false,
            //             searchable: false,
            //         },
            //         {
            //             data: "title",
            //             name: "Title",
            //         },
            //         {
            //             data: "image",
            //             name: "Thumbnail",
            //         },
            //         {
            //             data: "limitDescription",
            //             name: "Description",
            //         },
            //         {
            //             data: "action",
            //             name: "Action",
            //         },
            //     ],
            //     language: {
            //         lengthMenu: "Tampil _MENU_ data",
            //         search: "Cari",
            //         emptyTable: "Tidak ada data",
            //         info: "Tampilkan _START_ ke _END_ dari _TOTAL_ data",
            //     },
            //     columnDefs: [{
            //             width: '0%',
            //             className: 'text-center',
            //             targets: 0
            //         },
            //         {
            //             width: '20%',
            //             targets: 1
            //         },
            //         {
            //             width: '20%',
            //             targets: 2
            //         },
            //         {
            //             width: '40%',
            //             targets: 3
            //         },
            //         {
            //             width: '20%',
            //             targets: 4
            //         }
            //     ],
            //     dom: `<"card-body border-bottom py-3"<"d-flex"<"text-secondary"l><"ms-auto text-secondary"<"ms-2 d-inline-block"f>>>><"table-responsive"t><"card-footer d-flex align-items-center"<"m-0 text-secondary"i><"pagination m-0 ms-auto"p>>>`,
            // });

            // $('#dt-length-1').removeClass('form-select-sm').addClass('form-select-md');
            // $('#dt-search-1').removeClass('form-control-sm').addClass('form-control-md');
        });
    </script>
@endpush
