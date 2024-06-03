<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilSekolahController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $profileSekolah = Profile::where('id', 1)->first();
        if ($request->isMethod('put')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg',
                'visi' => 'required',
                'sambutan' => 'required',
                'alamat_sekolah' => 'required'
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
            }

            $profileSekolah = Profile::where('id', 1)->first();


            if (!$profileSekolah) {
                return $this->errorResponse(null, 'Data Profile tidak ditemukan.', 404);
            }

            $updateProfile = [
                'nama_sekolah' => $request->nama,
                'visi' => $request->visi,
                'sambutan_kepsek' => $request->sambutan,
                'alamat_sekolah' => $request->alamat_sekolah,
            ];

            if ($request->hasFile('image')) {
                if (Storage::exists('public/img/profil/' . $profileSekolah->image)) {
                    Storage::delete('public/img/profil/' . $profileSekolah->image);
                }
                $image = $request->file('image')->hashName();
                $request->file('image')->storeAs('public/img/profil', $image);
                $updateProfile['logo_sekolah'] = $image;
            }

            $profileSekolah->update($updateProfile);

            return $this->successResponse($profileSekolah, 'Data Profil Sekolah diubah.');
        }

        return view('admin.profilsekolah.index', compact('profileSekolah') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateKontak(Request $request)
    {
        $profileSekolah = Profile::where('id', 1)->first();

        if (!$profileSekolah) {
            return $this->errorResponse(null, 'Data Kontak tidak ditemukan.', 404);
        }

        $updateProfile = [
            'no_telepon' => $request->no_telepon,
            'ig' => $request->ig,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ];

        $profileSekolah->update($updateProfile);

        return $this->successResponse($profileSekolah, 'Data Kontak Sekolah diubah.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}