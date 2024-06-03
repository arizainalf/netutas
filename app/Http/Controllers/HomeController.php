<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\Berita;
use App\Models\Profile;
use App\Models\Prestasi;
use App\Models\StaffGuru;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Models\Ekstrakurikuler;

class HomeController extends Controller
{
    use JsonResponder;

    public function index()
    {
        $berita = Berita::latest()->take(6)->get();
        $ekstrakurikuler = Ekstrakurikuler::count();
        $prestasi = Prestasi::latest()->take(6)->get();
        $staff = StaffGuru::oldest()->take(9)->get();
        $profile = Profile::where('id', 1)->first();
        $kepsek = StaffGuru::whereHas('jabatan', function ($query) {
            $query->where('nama', 'Kepala Sekolah');
        })->first();
        $misi = Misi::all();


        return view('pages.home.index', compact('berita', 'ekstrakurikuler', 'prestasi', 'staff','profile','kepsek','misi'));
    }

    public function berita(Request $request){

        $beritas = Berita::with('user')->paginate(9);
        $profile = Profile::where('id', 1)->first();

        
        if ($request->ajax()) {

            $beritas = Berita::with('user')->get();

            return $this->successResponse($beritas, 'Data Berita ditemukan.');

        };
        return view('pages.berita.index',compact('beritas','profile'));
    }

    public function prestasi(Request $request){
        $prestasis = Prestasi::paginate(9);
        $profile = Profile::where('id', 1)->first();

        
        if ($request->ajax()) {

            $prestasis = Prestasi::take(4)->get();

            return $this->successResponse($prestasis, 'Data Berita ditemukan.');

        };
        return view('pages.prestasi.index',compact('prestasis','profile'));
    }

    public function kontak(Request $request){
    $profile = Profile::where('id', 1)->first();
    
    return view('pages.kontak.index',compact('profile'));
    }

    public function staff(Request $request){
        $staffs = StaffGuru::with('jabatan','mapel')->paginate(9);
        $profile = Profile::where('id', 1)->first();

        
        if ($request->ajax()) {

            $staffs = Prestasi::take(4)->get();

            return $this->successResponse($staffs, 'Data Berita ditemukan.');

        };
        return view('pages.staff.index',compact('staffs','profile'));
    }

    public function getBerita(Request $request, $slug){
        
        if ($request->ajax()) {
            $berita = Berita::find($slug);

            if (!$berita) {
                return $this->errorResponse(null, 'Data Berita tidak ditemukan.', 404);
            }
            
            return $this->successResponse($berita, 'Data Berita ditemukan.');
        }
        
        $berita = Berita::findOrFail($slug);

        return view('pages.berita.show', compact('berita'));
    }
}