<?php

namespace App\Http\Controllers\landingpage;

use App\Http\Controllers\Controller;
use App\Models\Galleries;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $data = Galleries::paginate(8);
        // @dd($data);
        return view(
            'landingpage.gallery',
            [
                'hero' => 'Gallery',
                'gallery' => $data
            ]
        );
    }
}
