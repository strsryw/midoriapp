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
        return view('landingpage.detailBerita', [
            'hero' => 'Berita',
            'data' => $content
        ]);
    }
}
