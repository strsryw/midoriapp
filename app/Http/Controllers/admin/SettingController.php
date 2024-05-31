<?php

namespace App\Http\Controllers\admin;

use App\Models\SettingWeb;
use App\Models\SocialMedia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $setting_web = SettingWeb::first();
        return view('admin.setting', compact('setting_web'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = [];
        if ($request->file('logo')) {
            if ($request->input('old_img')) {
                Storage::delete('public/landing_page/' . $request->input('old_img'));
            }

            $nameImage = Str::random(30) . '.' . $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('public/landing_page', $nameImage);

            $data['logo'] = $nameImage;
        }

        $data = [
            'alt_logo' => $request->input('alt-logo'),
            'about' => $request->input('about'),
            'company_address' => $request->input('company-address'),
            'google_maps' => $request->input('google-maps'),
            'number_phone' => $request->input('number_phone'),
            'email' => $request->input('email')
        ];

        $settingWeb = SettingWeb::where('id', $id)->update($data);

        if ($settingWeb) {
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil di Update',
                'redirect' => route('admin.setting.index')
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Gagal memperbarui data'
        ], 200);
    }

    public function destroy($id)
    {
    }
}
