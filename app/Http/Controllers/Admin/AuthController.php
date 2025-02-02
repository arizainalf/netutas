<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use App\Traits\JsonResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use JsonResponder;

    public function login(Request $request)
    {
        $profileSekolah = Profile::where('id', 1)->first();

        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required|min:8',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
            }

            if (! Auth::attempt($request->only('email', 'password'))) {
                return $this->errorResponse(null, 'Email atau password tidak valid.', 401);
            }

            $user = Auth::user();
            if ($request->ajax()) {
                return $this->successResponse($user, 'Login berhasil.');
            } else {
                return redirect()->route('admin.dashboard');
            }

        }

        return view('auth.login', compact('profileSekolah'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
