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
                    <h1 class="text-center my-3">Edit Artikel</h1>
                </div>
                <div class="card-body">
                    <form action="" enctype="multipart/form-data" name="" id="formEditArtikel">
                        @method('PUT')
                        <input type="hidden" id="idArtikel" value="{{ $data->id }}">
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
                                <input type="hidden" id="oldImage" value="{{ $data->image }}">
                                <input class="form-control" type="file" id="foto">
                            </div>
                        </div>
                        <div class="mb-3 row" id="rowRiviewImg">
                            <div class="col-md-2 col-sm-12">

                            </div>
                            <div class="col-md-10 col-sm-12">
                                <img src="/storage/fotoartikel/{{ $data->image }}" class="img-thumbnail" alt="Image"
                                    id="reviewImg" style="max-height: 300px; width:auto;">
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
                        <div class="mb-3 row">
                            <div class="col-md-2 col-sm-12">
                                <label for="content" class="form-label">Content</label>
                            </div>
                            <div class="col-md-10 col-sm-12">
                                <textarea type="text" class="form-control" name='content' id="content">{!! $data->content !!}</textarea>
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
                selector: '#content',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                automatic_uploads: true,
                images_upload_url: "{{ route('admin.artikel.imageUpload') }}",
                file_picker_types: "image",
                branding: false,
                tinycomments_author: 'Author name',
                automatic_uploads: true,
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload
                                .blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                    "See docs to implement AI Assistant")),
            });
        })

        function updateData() {
            var formData = new FormData($("#formEditArtikel")[0]);
            var content = tinymce.activeEditor.getContent();
            formData.append('content', content);
            formData.append('_method', 'put');
            const id = $('#idArtikel').val();
            const url = '/admin/artikel/' + id;
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false, // Set processData menjadi false agar FormData tidak diproses secara otomatis
                success: function(response) {
                    console.log(response);
                    return
                    $("#judul").val('');
                    $("#deskripsi").val('');
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
    </script>
@endpush
