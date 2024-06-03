<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Berita;
use App\Models\Prestasi;
use App\Models\StaffGuru;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Models\Ekstrakurikuler;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    use JsonResponder;
    public function index()
    {
        $berita = Berita::count();
        $ekstrakurikuler = Ekstrakurikuler::count();
        $prestasi = Prestasi::count();
        $staff = StaffGuru::count();
        $user = User::count();

        return view('admin.dashboard.index', compact('berita', 'user', 'prestasi', 'staff'));
    }
}