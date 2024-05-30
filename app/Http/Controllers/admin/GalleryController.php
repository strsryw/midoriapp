<?php

namespace App\Http\Controllers\admin;

use App\Models\Galleries;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Galleries::latest();
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
                })->addColumn('limitDescription', function ($data) {
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
                        $trimmed_text = $data->description;
                    }

                    return $trimmed_text;
                })
                ->addColumn('image', function ($data) {
                    $url = asset('storage/foto_gallery/' . $data->image);
                    return '<div class="text-center"><img src="' . $url . '" border="0" width="75" class="img-thumbnail" /></div>';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.gallery', [
            'title' => 'Gallery'
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->only(['judul', 'foto', 'deskripsi']), [
            'judul' => 'required',
            'foto' => 'required|image|max:2048|mimes:png,jpg,jpeg',
            'deskripsi' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 400);
        }

        $nameImage = Str::random(30) . '.' . $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->storeAs('public/foto_gallery', $nameImage);

        // Simpan data ke database
        $gallery = Galleries::create([
            'title' => $request->input('judul'),
            'image' => $nameImage,
            'description' =>  $request->input('deskripsi')
        ]);

        if ($gallery) {
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil di Insert'
            ], 200);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Galleries::where('id', $id)->first();
        return response()->json([
            'status' => true,
            'message' => 'Data Berhasil didapat',
            'data' => $data
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $data = [];
        $foto = $request->file('image');

        if ($foto) {
            if ($request->input('oldImage')) {
                Storage::delete('public/foto_gallery/' . $request->input('oldImage'));
            }

            // Simpan file dengan nama unik menggunakan storeAs()
            $imageName = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/foto_gallery/', $imageName);

            // Simpan nama file ke dalam $data
            $data['image'] = $imageName;
        }

        // Buat array baru dengan data yang diperbarui
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');

        $gallery = Galleries::where('id', $id)->update($data);

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


    public function destroy($id)
    {
        $gallery = Galleries::find($id);
        if (!$gallery) {
            return response()->json(['status' => false], 404);
        }

        // Hapus foto dari direktori
        Storage::delete('public/foto_gallery/' . $gallery->image);

        // Hapus entri dari database
        $gallery->delete();

        return response()->json(['status' => true]);
    }
}
