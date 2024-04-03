@extends('admin.layouts.main')
@section('content')
    @push('css')
        <script src="https://cdn.tiny.cloud/1/7zdw7wouyd7q3o67u5jr3miejmlahrnpaocg7kifgdofnyzx/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>
    @endpush
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
                    <h1 class="text-center my-3">Edit Berita</h1>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" name="" id="formEditBerita">
                        @method('PUT')
                        <input type="hidden" id="idBerita" name="idBerita" value="{{ $data->id }}">
                        <div class="mb-3 row">
                            <div class="col-md-2 col-sm-12">
                                <label for="nama" class="form-label">Judul</label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                                <input type="text" class="form-control" name='judul' id="judul"
                                    value="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2 col-sm-12">
                                <label for="foto" class="form-label">Foto</label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                                <input type="hidden" id="oldImage" name="oldImage" value="{{ $data->image }}">
                                <input class="form-control" type="file" id="foto" name="foto"
                                    onchange="selectFoto()">
                            </div>
                        </div>
                        <div class="mb-3 row" id="rowRiviewImg">
                            <div class="col-md-2 col-sm-12">

                            </div>
                            <div class="col-md-10 col-sm-12">
                                <img src="/storage/fotoberita/{{ $data->image }}" class="img-thumbnail" alt="Image"
                                    id="reviewImg" name="reviewImg" style="max-height: 300px; width:auto;">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-2 col-sm-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                                <textarea type="text" class="form-control" name='deskripsi' id="deskripsi"> {{ $data->description }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary" id="btnUpdate" onclick="updateData()">
                        Update</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#deskripsi',
                plugins: 'table lists',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | table | insertunorderedlist insertorderedlist', // Menambahkan tombol untuk unordered list (insertunorderedlist) dan ordered list (insertorderedlist)
                tinycomments_mode: 'embedded',
                branding: false,
                tinycomments_author: 'Author name',
                automatic_uploads: true,
                height: 500
            });
        })

        function updateData() {
            var formData = new FormData($("#formEditBerita")[0]);
            var deskripsi = tinymce.activeEditor.getContent();
            const id = $('#idBerita').val();
            formData.append('deskripsi', deskripsi);
            formData.append('_method', 'put');
            formData.append('id', id);
            const url = '/admin/berita/' + id;
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false, // Set processData menjadi false agar FormData tidak diproses secara otomatis
                success: function(response) {
                    // console.log(response);
                    // return
                    document.getElementById('reviewImg').style.display = 'none';
                    $("#judul").val('');
                    $('#foto').val('');
                    tinyMCE.activeEditor.setContent('');
                    // console.log(response);
                    // return
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
                },
                error: function(xhr, status, error) {
                    // Tindakan jika terjadi kesalahan
                },
            });
        }

        //fungsi onchange foto
        function selectFoto() {
            var input = document.getElementById('foto');
            var img = document.getElementById('reviewImg');

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
