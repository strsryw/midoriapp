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
                            <h3 class="card-title">Tambah Berita</h3>
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
                                    <input class="form-control" type="file" id="foto" onchange="selectFoto()">
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
                                    <label for="content" class="form-label">Deskripsi</label>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                    <textarea type="text" class="form-control" name='deskripsi' id="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('admin.berita.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-primary" id="btnInsert" onclick="simpanData()">Simpan
                                        Berita</button>
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


        function simpanData() {

            var judul = document.getElementById("judul").value;
            var foto = document.getElementById("foto").files[0];
            var deskripsi = tinymce.activeEditor.getContent();
            var formData = new FormData(); // Buat objek FormData
            formData.append("judul", judul);
            formData.append("foto", foto);
            formData.append('deskripsi', deskripsi);
            $.ajax({
                url: "{{ route('admin.berita.store') }}",
                type: "post",
                data: formData,
                contentType: false,
                processData: false, // Set processData menjadi false agar FormData tidak diproses secara otomatis
                success: function(response) {
                    $("#judul").val('');
                    $('#foto').val('');
                    tinyMCE.activeEditor.setContent('');
                    // console.log(response);
                    document.getElementById('rowRiviewImg').classList.add('d-none');
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
