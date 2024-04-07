<?php

namespace App\Http\Controllers;

use App\Models\Beritas;
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
}
// function () {

// }