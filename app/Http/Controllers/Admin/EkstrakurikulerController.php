<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Models\Ekstrakurikuler;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class EkstrakurikulerController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ekstrakurikulers = Ekstrakurikuler::all();
            if ($request->mode == "datatable") {
                return DataTables::of($ekstrakurikulers)
                    ->addColumn('action', function ($ekstrakurikuler) {
                        $editButton = '<button class="btn btn-sm btn-warning d-inline-flex  align-items-baseline  mr-1" onclick="getModal(`createModal`, `/admin/ekstrakurikuler/' . $ekstrakurikuler->id . '`, [`id`, `nama`,`deskripsi`,`telp`,`facebook`,`email`,`youtube`,`twitter`])"><i class="fas fa-edit mr-1"></i>Edit</button>';
                        $deleteButton = '<button class="btn btn-sm btn-danger d-inline-flex  align-items-baseline " onclick="confirmDelete(`/admin/ekstrakurikuler/' . $ekstrakurikuler->id . '`, `ekstrakurikuler-table`)"><i class="fas fa-trash mr-1"></i>Hapus</button>';
                        return $editButton . $deleteButton;
                    })
                    ->addColumn('logo', function ($ekstrakurikuler) {
                        return '<img src="/storage/img/ekstrakurikuler/' . $ekstrakurikuler->logo . '" width="150px" alt="">';
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action', 'logo'])
                    ->make(true);
            }

            return $this->successResponse($ekstrakurikulers, 'Data ekstrakurikuler ditemukan.');
        };

        return view('admin.ekstrakurikuler.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg|max:5120',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        $image = $request->file('image')->hashName();
        $request->file('image')->storeAs('public/img/ekstrakurikuler', $image);

        $Ekstrakurikuler = Ekstrakurikuler::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'logo' => $image,
            'telp' => $request->telp,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ]);

        return $this->successResponse($Ekstrakurikuler, 'Data Ekstrakurikuler Disimpan!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eskul = Ekstrakurikuler::find($id);

        if (!$eskul) {
            return $this->errorResponse(null, 'Data Ekstrakurikuler Tidak Ada!');
        }

        return $this->successResponse($eskul, 'Data Ekstrakurikuler Ditemukan!');
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
            'gambar' => 'image|mimes:png,jpg,jpeg|max:5120',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        $ekstrakurikuler = Ekstrakurikuler::find($id);

        if (!$ekstrakurikuler) {
            return $this->errorResponse(null, 'Data Buku Tidak Ada!');
        }

        $updateEkstrakurikuler = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'telp' => $request->telp,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
        ];

        if ($request->hasFile('image')) {
            if (Storage::exists('public/img/Ekstrakurikuler/' . $ekstrakurikuler->gambar)) {
                Storage::delete('public/img/Ekstrakurikuler/' . $ekstrakurikuler->gambar);
            }
            $image = $request->file('image')->hashName();
            $request->file('image')->storeAs('public/img/Ekstrakurikuler', $image);
            $updateEkstrakurikuler['gambar'] = $image;
        }
        
        $ekstrakurikuler->update($updateEkstrakurikuler);

        return $this->successResponse($ekstrakurikuler, 'Data Buku Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eskul = Ekstrakurikuler::find($id);

        if (!$eskul) {
            return $this->errorResponse(null, 'Data Ekstrakurikuler Tidak Ada!');
        }

        if (Storage::exists('public/img/ekstrakurikuler/' . $eskul->image)) {
            Storage::delete('public/img/ekstrakurikuler/' . $eskul->image);
        }

        $eskul->delete();

        return $this->successResponse(null, 'Data Ekstrakurikuler Dihapus!');
    }
}