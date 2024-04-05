<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use App\Models\Beritas;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {

        $berita = Beritas::paginate(6);
        return view('landingpage.berita', [
            'hero' => 'Berita',
            'datas' => $berita
        ]);
    }

    public function singlePage($id)
    {
        $content = Beritas::findorFail($id);
        $previous = Beritas::where('id', '<', $content->id)->orderBy('id', 'desc')->first(); // Ambil berita sebelumnya berdasarkan id terbesar
        $next = Beritas::where('id', '>', $content->id)->orderBy('id', 'asc')->first(); // Ambil berita berikutnya berdasarkan id terkecil

        // dd($previous);
        return view('landingpage.detailBerita', [
            'hero' => $content->title,
            'date' => $content->created_at->format('M d, Y'),
            'data' => $content,
            'prev' => $previous,
            'next' => $next
        ]);
    }
}
