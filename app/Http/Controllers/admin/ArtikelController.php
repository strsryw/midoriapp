<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Artikels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Artikels::latest()->get();
            // $data = pegawai::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<div class="text-lg-center">
                        <button class="btn btn-primary btn-icon" id="btnEdit" data-id="' . $data->id . '" onclick="detailData(' . $data->id . ')">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </button>
                        <a href="/admin/artikel/' . $data->id . '/edit"><button class="btn btn-success btn-icon" id="btnEdit" data-id="' . $data->id . '">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                        </button></a>
                        <button class="btn btn-danger btn-icon" id="btnDelete" data-id="' . $data->id . '" onclick="deleteData(' . $data->id . ')">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </button>
                        </div>
                        ';
                })
                ->addColumn('image', function ($data) {
                    $url = asset('storage/fotoartikel/' . $data->image);
                    return '<div class="text-center"><img src="' . $url . '" border="0" width="75" class="img-rounded" /></div>';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view(
            'admin.artikel.artikel',
            ['title' => 'Artikel']
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
            'admin.artikel.tambah',
            ['title' => 'Artikel']
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
        $foto->storeAs('public/fotoartikel', $namaFoto); // Simpan foto ke penyimpanan

        // Simpan data ke database
        $artikel = new Artikels();
        $artikel->title = $request->judul;
        $artikel->description = $request->deskripsi;
        $artikel->image = $namaFoto;
        $artikel->content = $request->content;

        // Simpan nama foto ke dalam kolom 'foto' di tabel
        $artikel->save();

        if ($artikel) {
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
        $data = Artikels::find($id);
        // //
        // // dd($id);
        return view(
            'admin.artikel.edit',
            [
                'title' => 'Artikel',
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
        //
        return $request->all();
        $data = [];
        $foto = $request->file('image');

        if ($foto) {
            if ($request->input('oldImage')) {
                Storage::delete('public/fotoartikel/' . $request->input('oldImage'));
            }

            // Simpan file dengan nama unik menggunakan storeAs()
            $imageName = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/fotoartikel/', $imageName);

            // Simpan nama file ke dalam $data
            $data['image'] = $imageName;
        }

        // Buat array baru dengan data yang diperbarui
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['content'] = $request->input('content');
        $artikel = Artikels::where('id', $request->input('id'))->update($data);

        if ($artikel) {
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
        $artikel = Artikels::find($id);
        if (!$artikel) {
            return response()->json(['status' => '0'], 404);
        }

        // Hapus foto dari direktori
        Storage::delete('public/fotoartikel/' . $artikel->image);

        // Hapus entri dari database
        $artikel->delete();

        return response()->json(['status' => '1']);
    }

    public function imageUpload(Request $request)
    {
        // $foto->storeAs('public/fotoberita', $namaFoto);
        $imgpath = $request->file('file')->store('content_img_artikel', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
