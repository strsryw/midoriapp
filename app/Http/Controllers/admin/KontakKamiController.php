<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KontakKami;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class KontakKamiController extends Controller
{

    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
            $data = KontakKami::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        $title = 'Kontak Kami';
        return view('admin.kontakkami', compact('title'));
    }
}
