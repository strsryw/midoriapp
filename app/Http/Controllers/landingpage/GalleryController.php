<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use App\Models\Galleries;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Galleries::latest()->paginate(6)->onEachSide(1);

        return view('landingpage.gallery', [
            'hero' => 'Gallery',
            'datas' => $data
        ]);
    }
}
