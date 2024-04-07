<?php

namespace App\Http\Controllers;

use App\Models\Beritas;
use App\Models\KontakKami;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $berita = Beritas::latest()->limit(3)->get();
        return view(
            'landingpage.index',
            [
                'hero' => 'index',
                'datas' => $berita
            ]
        );
    }

    public function kontakkami()
    {
        return view(
            'landingpage.kontakkami',
            [
                'hero' => 'Kontak Kami'
            ]
        );
    }

    public function sendMessage(Request $request)
    {
        // return $request->all();
        $kontak = new KontakKami;
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $kontak->subjek = $request->subjek;
        $kontak->pesan = $request->pesan;
        $kontak->save();
        if ($kontak) {
            return response()->json([
                'status' => true,
                'message' => 'Anda Berhasil Mengirimkan Pesan'
            ], 200);
        }
    }
}
