<?php

namespace App\Http\Controllers\admin;

use App\Models\Beritas;
use App\Models\SettingWeb;
use App\Models\SocialMedia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Beritas::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<div class="text-lg-center">
                        <a href="' . route('landing-page.detail-berita', $data->id) . '" class="btn btn-primary btn-icon">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                        </a>
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
                    $url = asset('storage/foto_berita/' . $data->image);
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
        return view('admin.berita.berita', [
            'title' => 'Berita'
        ]);
    }

    public function create()
    {
        return view('admin.berita.tambah', [
            'title' => 'Berita'
        ]);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->only('judul', 'deskripsi', 'foto'), [
            'judul' => 'required|unique:beritas,title',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validated->errors()
            ], 400);
        }

        $nameImage = Str::random(30) . '.' . $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->storeAs('public/foto_berita/', $nameImage);

        $beritas = Beritas::create([
            'title' => $request->input('judul'),
            'slug' => Str::slug($request->input('judul')),
            'description' => $request->input('deskripsi'),
            'image' => $nameImage
        ]);

        if ($beritas) {
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil disimpan'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data Gagal disimpan'
        ], 200);
    }

    public function show($slug)
    {
        $content = Beritas::where('slug', $slug)->first();
        $previous = Beritas::where('id', '<', $content->id)->orderBy('id', 'desc')->first();
        $next = Beritas::where('id', '>', $content->id)->orderBy('id', 'asc')->first();
        $setting_web = SettingWeb::first();
        $social_medias = SocialMedia::get();

        return view('landingpage.detailBerita', [
            'hero' => $content->title,
            'date' => $content->created_at->format('M d, Y'),
            'data' => $content,
            'prev' => $previous,
            'next' => $next,
            'social_medias' => $social_medias,
            'setting' => $setting_web
        ]);
    }

    public function edit($id)
    {

        $data = Beritas::find($id);
        return view(
            'admin.berita.edit',
            [
                'title' => 'Berita',
                'data' => $data
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $data = [];
        $foto = $request->file('foto');
        if ($foto) {
            if ($request->input('oldImage')) {
                Storage::delete('public/foto_berita/' . $request->input('oldImage'));
            }

            // Simpan file dengan nama unik menggunakan storeAs()
            $imageName = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('public/foto_berita/', $imageName);

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

    public function destroy($id)
    {
        // Hapus data dari database
        $berita = Beritas::find($id);
        if (!$berita) {
            return response()->json(['status' => '0'], 404);
        }

        // Hapus foto dari direktori
        Storage::delete('public/foto_berita/' . $berita->image);

        // Hapus entri dari database
        $berita->delete();

        return response()->json(['status' => '1']);
    }
}
