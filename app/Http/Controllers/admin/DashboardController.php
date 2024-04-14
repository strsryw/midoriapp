<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Artikels;
use App\Models\Beritas;
use App\Models\Galleries;
use App\Models\KontakKami;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.dashboard', [
            'news' => Beritas::count(),
            'articles' => Artikels::count(),
            'galleries' => Galleries::count(),
            'messages' => KontakKami::count()
        ]);
    }
}
