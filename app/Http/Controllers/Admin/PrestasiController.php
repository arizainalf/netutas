<?php

namespace App\Http\Controllers\Admin;

use App\Models\prestasi;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PrestasiController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $prestasis = Prestasi::all();
            if ($request->mode == "datatable") {
                return DataTables::of($prestasis)
                    ->addColumn('action', function ($prestasi) {
                        $editButton = '<button class="btn btn-sm btn-warning d-inline-flex  align-items-baseline  mr-1" onclick="getModal(`createModal`, `/admin/prestasi/' . $prestasi->id . '`, [`id`, `nama`,`deskripsi`,`peraih`,`tingkat`])"><i class="fas fa-edit mr-1"></i>Edit</button>';
                        $deleteButton = '<button class="btn btn-sm btn-danger d-inline-flex  align-items-baseline " onclick="confirmDelete(`/admin/prestasi/' . $prestasi->id . '`, `prestasi-table`)"><i class="fas fa-trash mr-1"></i>Hapus</button>';
                        return $editButton . $deleteButton;
                    })
                    ->addColumn('image', function ($prestasi) {
                        return '<img src="/storage/img/prestasi/' . $prestasi->image . '" width="150px" alt="">';
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action', 'image'])
                    ->make(true);
            }

            return $this->successResponse($prestasis, 'Data prestasi ditemukan.');
        };

        return view('admin.prestasi.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tingkat' => 'required',
            'peraih' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        $image = $request->file('gambar')->hashName();
        $request->file('gambar')->storeAs('public/img/prestasi', $image);

        $prestasi = Prestasi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'image' => $image,
            'tingkat' => $request->tingkat,
            'peraih' => $request->peraih,
        ]);

        return $this->successResponse($prestasi, 'Data prestasi Disimpan!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestasi = Prestasi::find($id);

        if (!$prestasi) {
            return $this->errorResponse(null, 'Data prestasi Tidak Ada!');
        }

        return $this->successResponse($prestasi, 'Data prestasi Ditemukan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tingkat' => 'required',
            'peraih' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:5120',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        $prestasi = Prestasi::find($id);

        if (!$prestasi) {
            return $this->errorResponse(null, 'Data Prestasi Tidak Ada!');
        }

        $updatePrestasi = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tingkat' => $request->tingkat,
            'peraih' => $request->peraih,
        ];

        if ($request->hasFile('gambar')) {
            if (Storage::exists('public/img/prestasi/' . $prestasi->image)) {
                Storage::delete('public/img/prestasi/' . $prestasi->image);
            }
            $image = $request->file('gambar')->hashName();
            $request->file('gambar')->storeAs('public/img/prestasi/', $image);
            
            $updatePrestasi['image'] = $image;
        }
        
        $prestasi->update($updatePrestasi);

        return $this->successResponse($prestasi, 'Data Prestasi Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestasi = Prestasi::find($id);

        if (!$prestasi) {
            return $this->errorResponse(null, 'Data prestasi Tidak Ada!');
        }

        if (Storage::exists('public/img/prestasi/' . $prestasi->image)) {
            Storage::delete('public/img/prestasi/' . $prestasi->image);
        }

        $prestasi->delete();

        return $this->successResponse(null, 'Data prestasi Dihapus!');
    }
}