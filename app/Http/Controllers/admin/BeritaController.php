<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Beritas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Beritas::latest()->get();
            // $data = pegawai::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<div class="text-lg-center">
                        <a href="/admin/berita/' . $data->id . '/edit"><button class="btn btn-success btn-icon" id="btnEdit" data-id="' . $data->id . '">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                        </button></a>
                        <button class="btn btn-danger btn-icon" id="btnDelete" data-id="' . $data->id . '" onclick="deleteData(' . $data->id . ')">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </button>
                        </div>
                        ';
                })
                ->addColumn('image', function ($data) {
                    $url = asset('storage/fotoberita/' . $data->image);
                    return '<div class="text-center"><img src="' . $url . '" border="0" width="75" class="img-rounded" /></div>';
                })
                ->addColumn('limitDescription', function ($data) {
                    // Menghapus tag <h1>, termasuk teks di dalamnya
                    $html_stripped = preg_replace('/<h[1-6]>.*?<\/h[1-6]>/i', '', $data->description);

                    // Menghapus tag HTML lainnya dan style dari string
                    $html_stripped = strip_tags($html_stripped);
                    $html_stripped = preg_replace('/\s+/', ' ', $html_stripped); // Menggabungkan spasi berlebih menjadi satu spasi
                    $html_stripped = str_replace('&nbsp;', ' ', $html_stripped); // Mengganti &nbsp; dengan spasi

                    // Memotong string jika lebih dari 100 karakter
                    $trimmed_text = mb_substr($html_stripped, 0, 100);

                    // Memastikan tidak memotong string di tengah kata
                    $last_space_pos = mb_strrpos($trimmed_text, ' ');
                    $trimmed_text = mb_substr($trimmed_text, 0, $last_space_pos);

                    // Jika lebih dari 100 karakter, tambahkan '...'
                    if (mb_strlen($html_stripped) > 100) {
                        $trimmed_text .= '...';
                    } else {
                        $trimmed_text = $html_stripped;
                    }

                    return $trimmed_text;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view(
            'admin.berita.berita',
            ['title' => 'Berita']
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.berita.tambah',
            ['title' => 'Berita']
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $namaFoto = $foto->getClientOriginalName(); // Mendapatkan nama asli file
        $foto->storeAs('public/fotoberita', $namaFoto); // Simpan foto ke penyimpanan

        // Simpan data ke database
        $berita = new Beritas();
        $berita->title = $request->judul;
        $berita->image = $namaFoto;
        $berita->description = $request->deskripsi;


        // Simpan nama foto ke dalam kolom 'foto' di tabel
        $berita->save();

        if ($berita) {
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil di Insert'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Beritas::find($id);
        // //
        // // dd($id);
        return view(
            'admin.berita.edit',
            [
                'title' => 'Berita',
                'data' => $data
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [];
        $foto = $request->file('foto');
        if ($foto) {
            if ($request->input('oldImage')) {
                Storage::delete('public/fotoberita/' . $request->input('oldImage'));
            }

            // Simpan file dengan nama unik menggunakan storeAs()
            $imageName = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/fotoberita/', $imageName);

            // Simpan nama file ke dalam $data
            $data['image'] = $imageName;
        }

        // Buat array baru dengan data yang diperbarui
        $data['title'] = $request->input('judul');
        $data['description'] = $request->input('deskripsi');
        $berita = Beritas::where('id', $request->input('id'))->update($data);

        if ($berita) {
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil di Update'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Gagal memperbarui data'
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus data dari database
        $berita = Beritas::find($id);
        if (!$berita) {
            return response()->json(['status' => '0'], 404);
        }

        // Hapus foto dari direktori
        Storage::delete('public/fotoberita/' . $berita->image);

        // Hapus entri dari database
        $berita->delete();

        return response()->json(['status' => '1']);
    }

    public function imageUpload(Request $request)
    {
        // $foto->storeAs('public/fotoberita', $namaFoto);
        $imgpath = $request->file('file')->store('content_img_berita', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
