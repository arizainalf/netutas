<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    use JsonResponder;
    public function index(Request $request)
    {
        if ($request->isMethod('put')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg',
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
            }

            $user = Auth::user();

            if (!$user) {
                return $this->errorResponse(null, 'Data Karyawan tidak ditemukan.', 404);
            }

            $updateUser = [
                'nama' => $request->nama,
                'email' => $request->email,
            ];

            if ($request->hasFile('image')) {
                if ($user->image != 'default.png' && Storage::exists('public/img/user/' . $user->image)) {
                    Storage::delete('public/img/user/' . $user->image);
                }
                $image = $request->file('image')->hashName();
                $request->file('image')->storeAs('public/img/user', $image);
                $updateUser['image'] = $image;
            }

            $user->update($updateUser);

            return $this->successResponse($user, 'Data profil diubah.');
        }

        return view('admin.profil.index');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_lama' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }

        $user = Auth::user();

        if (!$user) {
            return $this->errorResponse(null, 'Data User tidak ditemukan.', 404);
        }

        if (!Hash::check($request->password_lama, $user->password)) {
            return $this->errorResponse(null, 'Password Lama Tidak Sesuai.', 422);
        }

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return $this->successResponse($user, 'Data Password diubah.');
    }
}