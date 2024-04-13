<?php

namespace App\Http\Controllers;

use App\Models\Beritas;
use App\Models\Artikels;
use App\Models\Galleries;
use App\Models\KontakKami;
use App\Models\SettingWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingPageController extends Controller
{
    public function index()
    {
        $berita = Beritas::latest()->limit(3)->get();
        $setting_web = SettingWeb::first();
        return view('landingpage.index', [
            'hero' => 'index',
            'setting' => $setting_web,
            'datas' => $berita
        ]);
    }

    public function profile()
    {
        $setting_web = SettingWeb::first();
        return view('landingpage.profil', [
            'hero' => 'Profil LPK',
            'setting' => $setting_web
        ]);
    }

    public function news()
    {
        $setting_web = SettingWeb::first();
        $berita = Beritas::paginate(6);
        return view('landingpage.berita', [
            'hero' => 'Berita',
            'setting' => $setting_web,
            'datas' => $berita
        ]);
    }

    public function article()
    {
        $artikel = Artikels::latest()->paginate(6);
        $setting_web = SettingWeb::first();
        return view('landingpage.artikel', [
            'hero' => 'Artikel',
            'setting' => $setting_web,
            'datas' => $artikel
        ]);
    }

    public function gallery()
    {

        $gallery = Galleries::latest()->paginate(6)->onEachSide(1);
        $setting_web = SettingWeb::first();
        return view('landingpage.gallery', [
            'hero' => 'Gallery',
            'setting' => $setting_web,
            'datas' => $gallery
        ]);
    }

    public function contactUs()
    {
        $setting_web = SettingWeb::first();
        return view('landingpage.kontakkami', [
            'hero' => 'Kontak Kami',
            'setting' => $setting_web
        ]);
    }

    public function sendMessage(Request $request)
    {
        $validated = Validator::make($request->only('nama', 'email', 'subjek', 'pesan'), [
            'nama' => 'required',
            'email' => 'required|email:rfc,dns',
            'subjek' => 'required',
            'pesan' => 'required'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan pada saat penginputan'
            ], 200);
        }

        $kontakKami = KontakKami::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'subjek' => $request->input('subjek'),
            'pesan' => $request->input('pesan')
        ]);

        if ($kontakKami) {
            return response()->json([
                'status' => true,
                'message' => 'Anda Berhasil Mengirimkan Pesan'
            ], 200);
        }
    }
}