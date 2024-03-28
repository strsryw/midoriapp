<?php

namespace App\Http\Controllers\admin;

use App\Models\Galleries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Galleries::latest()->get();
        // $data = pegawai::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<div class="text-lg-center">
                    <button class="btn btn-success btn-icon" id="btnEdit" data-id="' . $data->id . '" onclick="editData(' . $data->id . ')">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                    </button>
                    <button class="btn btn-danger btn-icon" id="btnDelete" data-id="' . $data->id . '" onclick="deleteData(' . $data->id . ')">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                    </button>
                    </div>
                    ';
            })
            ->addColumn('image', function ($data) {
                $url = asset('storage/fotogallery/' . $data->image);
                return '<div class="text-center"><img src="' . $url . '" border="0" width="75" class="img-rounded" /></div>';
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi form jika diperlukan

        // Simpan foto ke penyimpanan yang diinginkan (misalnya: public storage)
        $foto = $request->file('foto');
        $namaFoto = $foto->getClientOriginalName(); // Mendapatkan nama asli file
        $foto->storeAs('public/fotogallery', $namaFoto); // Simpan foto ke penyimpanan

        // Simpan data ke database
        $gallery = new Galleries;
        $gallery->title = $request->judul;
        $gallery->description = $request->deskripsi;
        $gallery->image = $namaFoto; // Simpan nama foto ke dalam kolom 'foto' di tabel
        $gallery->save();

        if ($gallery) {
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil di Insert'
            ], 200);
        }

        // Tindakan setelah berhasil menyimpan data
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
        //
        $data = Galleries::where('id', $id)->first();
        return response()->json(
            [
                'status' => true,
                'message' => 'Data Berhasil didapat',
                'data' => $data
            ],
            200
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
        $gallery = Galleries::find($id);
        if (!$gallery) {
            return response()->json(['status' => '0'], 404);
        }

        // Hapus foto dari direktori
        Storage::delete('public/fotogallery/' . $gallery->image);

        // Hapus entri dari database
        $gallery->delete();

        return response()->json(['status' => '1']);
    }

    public function updateGallery(Request $request)
    {
        $data = [];
        $foto = $request->file('image');

        if ($foto) {
            if ($request->input('oldImage')) {
                Storage::delete('public/fotogallery/' . $request->input('oldImage'));
            }

            // Simpan file dengan nama unik menggunakan storeAs()
            $imageName = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/fotogallery/', $imageName);

            // Simpan nama file ke dalam $data
            $data['image'] = $imageName;
        }

        // Buat array baru dengan data yang diperbarui
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');

        $gallery = Galleries::where('id', $request->input('id'))->update($data);

        if ($gallery) {
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
}
