<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $beritas = Berita::with('user')->get();
            if ($request->mode == "datatable") {
                return DataTables::of($beritas)
                    ->addColumn('action', function ($berita) {
                        $editButton = '<button class="btn btn-sm btn-warning d-inline-flex  align-items-baseline  mr-1" onclick="getModal(`createModal`, `/admin/berita/' . $berita->id . '`, [`id`, `judul`,`deskripsi`,`slug`,`published_at`,`user_id`,])"><i class="fas fa-edit mr-1"></i>Edit</button>';
                        $deleteButton = '<button class="btn btn-sm btn-danger d-inline-flex  align-items-baseline " onclick="confirmDelete(`/admin/berita/' . $berita->id . '`, `berita-table`)"><i class="fas fa-trash mr-1"></i>Hapus</button>';
                        return $editButton . $deleteButton;
                    })
                    ->addColumn('image', function ($berita) {
                        return '<img src="/storage/img/berita/' . $berita->gambar . '" width="150px" alt="">';
                    })
                    ->addColumn('user', function ($berita) {
                        return $berita->user->nama;
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action', 'image', 'user'])
                    ->make(true);
            }
            return $this->successResponse($beritas, 'Data Berita ditemukan.');
        };
        return view('admin.berita.index');
    }

    public function show(string $id)
    {

        $user = Berita::find($id);

        if (!$user) {
            return $this->errorResponse(null, 'Data Berita Tidak Ada!');
        }

        return $this->successResponse($user, 'Data Berita Ditemukan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        
        $image = $request->file('gambar')->hashName();
        $request->file('gambar')->storeAs('public/img/berita', $image);

        $slug = Str::slug($request->get('judul'));
        $today = Carbon::today();
        $berita = Berita::create([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug,
            'published_at' => $today,
            'gambar' => $image,
        ]);

        return $this->successResponse($berita, 'Data Berita Disimpan!', 201);
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
        
        $validator = Validator::make($request->all(), [
            'gambar' => 'image|mimes:png,jpg,jpeg|max:10240',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        $berita = Berita::find($id);

        if (!$berita) {
            return $this->errorResponse(null, 'Data Buku Tidak Ada!');
        }

        $updateBerita = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('image')) {
            if (Storage::exists('public/img/berita/' . $berita->gambar)) {
                Storage::delete('public/img/berita/' . $berita->gambar);
            }
            $image = $request->file('image')->hashName();
            $request->file('image')->storeAs('public/img/berita', $image);
            $updateBerita['gambar'] = $image;
        }
        $berita->update($updateBerita);

        return $this->successResponse($berita, 'Data Buku Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return $this->errorResponse(null, 'Data Berita Tidak Ada!');
        }

        if (Storage::exists('public/img/berita/' . $berita->image)) {
            Storage::delete('public/img/berita/' . $berita->image);
        }

        $berita->delete();

        return $this->successResponse(null, 'Data Berita Dihapus!');
    }
}