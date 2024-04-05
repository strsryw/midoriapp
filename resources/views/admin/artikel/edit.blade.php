@extends('admin.layouts.main')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">{{ $title }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="mb-3 card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Artikel</h3>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" name="formEditArticle" id="formEditArticle">
                                <input type="hidden" id="old-image" name="old-image" value="{{ $data->image }}">
                                <div class="mb-3 row">
                                    <div class="col-md-2 col-sm-12">
                                        <label for="nama" class="form-label">Judul</label>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $data->title }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-2 col-sm-12">
                                        <label for="foto" class="form-label">Thumbnail</label>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <input class="form-control" type="file" id="image" name="image">
                                    </div>
                                </div>
                                <div class="mb-3 row" id="rowRiviewImg">
                                    <div class="col-md-2">
                                        <label for="foto" class="form-label">Riview Thumbnail</label>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <img src="{{ asset('storage/foto_artikel/' . $data->image) }}" class="img-thumbnail"
                                            alt="Image" id="reviewImg" style="max-height: 300px; width:auto;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-2 col-sm-12">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <textarea type="text" class="form-control" name='description' id="description">
                                        {{ $data->description }}
                                    </textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-link">Cancel</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-primary" id="btnUpdate">Update Artikel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.tiny.cloud/1/7zdw7wouyd7q3o67u5jr3miejmlahrnpaocg7kifgdofnyzx/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#description',
                plugins: 'table lists',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | table | insertunorderedlist insertorderedlist',
                tinycomments_mode: 'embedded',
                branding: false,
                tinycomments_author: 'Author name',
                automatic_uploads: true,
                height: 500
            });

            $('#btnUpdate').on('click', function(e) {
                e.preventDefault();

                var formData = new FormData($("#formEditArticle")[0]);
                var description = tinymce.get('description').getContent();
                var articleId = $("#id-article").val();

                formData.append('_method', 'PUT');
                formData.append('old-image', $('#old-image').val());
                formData.append('description', description);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.artikel.update', $data->id) }}",
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

            $('#image').on('change', function(e) {
                e.preventDefault();
                var input = this; // Menggunakan this untuk merujuk ke elemen yang memicu event
                var img = document.getElementById('reviewImg');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        img.src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            });

        });
    </script>
@endpush
