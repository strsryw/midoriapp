<?php

namespace App\Http\Controllers\admin;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{

    public function index()
    {
        $data = SocialMedia::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<div class="text-lg-center">
                        <button class="btn btn-danger btn-icon" id="btnDelete" data-id="' . $data->id . '" >
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </button>
                        </div>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->only('name', 'icon', 'link'), [
            'name' => 'required',
            'icon' => 'required',
            'link' => 'required|url|active_url'
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validated->errors()
            ], 400);
        }

        $socialMedia = SocialMedia::create([
            'name' => $request->input('name'),
            'class_icon' => $request->input('icon'),
            'link' => $request->input('link')
        ]);

        if ($socialMedia) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil disimpan'
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data gagal disimpan'
        ], 200);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
