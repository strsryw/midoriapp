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
                            <h3 class="card-title">Tambah Artikel</h3>
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
                                    <input type="hidden" id="oldImage" name="oldImage">
                                    <input class="form-control" type="file" id="foto" name="foto"
                                        onchange="selectFoto()">
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
                                    <textarea type="text" class="form-control is-invalid" name='deskripsi' id="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-primary" id="btnInsert">Simpan Artikel</button>
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
    <script src="https://cdn.tiny.cloud/1/yb1azwrff076d702t5wix7se8nbyv63n98so6aheoy9sdjj6/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#deskripsi',
                plugins: 'table lists',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | table | insertunorderedlist insertorderedlist',
                tinycomments_mode: 'embedded',
                branding: false,
                tinycomments_author: 'Author name',
                automatic_uploads: true,
                height: 500
            });

            $('#btnInsert').on('click', function(e) {
                var judul = document.getElementById("judul").value;
                var deskripsi = tinymce.activeEditor.getContent();
                var foto = document.getElementById("foto").files[0];
                var formData = new FormData();

                $('input').removeClass('is-invalid');
                $('.custon-invalid-feedback').remove();

                formData.append("judul", judul);
                formData.append("deskripsi", deskripsi);
                formData.append("foto", foto);
                $.ajax({
                    url: "{{ route('admin.artikel.store') }}",
                    type: "post",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        document.getElementById('rowRiviewImg').classList.add('d-none');
                        $("#judul").val('');
                        $("#deskripsi").val('');
                        $('#foto').val('');
                        tinyMCE.activeEditor.setContent('');

                        if (response.status) {
                            Swal.fire({
                                icon: "success",
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: response.message,
                                timer: 1500
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        var response = xhr.responseJSON.errors
                        if (response.judul) {
                            $('#judul').addClass('is-invalid');

                            var invalidFeedback =
                                '<div class="custon-invalid-feedback text-danger d-block mb-2"><small>' +
                                response.judul[0] + '</small></div>';
                            $('#judul').after(invalidFeedback);
                        }

                        if (response.foto) {
                            $('#foto').addClass('is-invalid');

                            var invalidFeedback =
                                '<div class="custon-invalid-feedback text-danger d-block mb-2"><small>' +
                                response.foto[0] + '</small></div>';
                            $('#foto').after(invalidFeedback);
                        }

                        if (response.deskripsi) {
                            var invalidFeedback =
                                '<div class="custon-invalid-feedback text-danger d-block mb-2"><small>' +
                                response.deskripsi[0] + '</small></div>';
                            $('.tox-tinymce').after(invalidFeedback);
                        }
                    },
                });
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
