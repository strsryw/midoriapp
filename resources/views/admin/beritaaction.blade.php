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
                    <h1 class="text-center my-3">Tambah Berita</h1>
                </div>
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
                    <div class="mb-3 row">
                        <div class="col-md-2 col-sm-12">
                            <label for="content" class="form-label">Content</label>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <textarea type="text" class="form-control" name='content' id="content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary" id="btnInsert" onclick="simpanData()">
                        Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            // function example_image_upload_handler(blobInfo, success, failure, progress) {
            //     var xhr, formData;

            //     xhr = new XMLHttpRequest();
            //     xhr.withCredentials = false;
            //     xhr.open('POST', "{{ route('admin.berita.imageUpload') }}");

            //     xhr.upload.onprogress = function(e) {
            //         progress(e.loaded / e.total * 100);
            //     };

            //     xhr.onload = function() {
            //         var json;

            //         if (xhr.status === 403) {
            //             failure('HTTP Error: ' + xhr.status, {
            //                 remove: true
            //             });
            //             return;
            //         }

            //         if (xhr.status < 200 || xhr.status >= 300) {
            //             failure('HTTP Error: ' + xhr.status);
            //             return;
            //         }

            //         json = JSON.parse(xhr.responseText);

            //         if (!json || typeof json.location != 'string') {
            //             failure('Invalid JSON: ' + xhr.responseText);
            //             return;
            //         }

            //         success(json.location);
            //     };

            //     xhr.onerror = function() {
            //         failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
            //     };

            //     formData = new FormData();
            //     formData.append('file', blobInfo.blob(), blobInfo.filename());

            //     xhr.send(formData);
            // };


            tinymce.init({
                selector: '#content',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                automatic_uploads: true,
                images_upload_url: "/admin/berita/image/upload",
                file_picker_types: "image",
                branding: false,
                tinycomments_author: 'Author name',
                automatic_uploads: true,
                // images_upload_handler: example_image_upload_handler,
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
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

        function simpanData() {
            var content = tinymce.activeEditor.getContent();
            // console.log(content);
            // return
            var judul = document.getElementById("judul").value;
            var deskripsi = document.getElementById("deskripsi").value;
            var foto = document.getElementById("foto").files[0]; // Mendapatkan file foto yang dipilih
            var formData = new FormData(); // Buat objek FormData
            formData.append("judul", judul);
            formData.append("deskripsi", deskripsi);
            formData.append("foto", foto);
            formData.append('content', content);
            $.ajax({
                url: "{{ route('admin.berita.store') }}",
                type: "post",
                data: formData,
                contentType: false,
                processData: false, // Set processData menjadi false agar FormData tidak diproses secara otomatis
                success: function(response) {
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
