<?php

namespace App\Http\Controllers\Admin;

use App\Models\mapel;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $mapels = Mapel::all();
            if ($request->mode == "datatable") {
                return DataTables::of($mapels)
                    ->addColumn('action', function ($mapel) {
                        $editButton = '<button class="btn btn-sm btn-warning d-inline-flex  align-items-baseline  mr-1" onclick="getModal(`createModal`, `/admin/mapel/' . $mapel->id . '`, [`id`, `nama`])"><i class="fas fa-edit mr-1"></i>Edit</button>';
                        $deleteButton = '<button class="btn btn-sm btn-danger d-inline-flex  align-items-baseline " onclick="confirmDelete(`/admin/mapel/' . $mapel->id . '`, `mapel-table`)"><i class="fas fa-trash mr-1"></i>Hapus</button>';
                        return $editButton . $deleteButton;
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return $this->successResponse($mapels, 'Data mapel ditemukan.');
        };

        return view('admin.mapel.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }

        $mapel = Mapel::create([
            'nama' => $request->nama,
        ]);

        return $this->successResponse($mapel, 'Data mapel Disimpan!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = Mapel::find($id);

        if (!$mapel) {
            return $this->errorResponse(null, 'Data mapel Tidak Ada!');
        }

        return $this->successResponse($mapel, 'Data mapel Ditemukan!');
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
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        $mapel = Mapel::find($id);

        if (!$mapel) {
            return $this->errorResponse(null, 'Data mapel Tidak Ada!');
        }

        $updatemapel = [
            'nama' => $request->nama,
        ];
        
        $mapel->update($updatemapel);

        return $this->successResponse($mapel, 'Data mapel Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = Mapel::find($id);

        if (!$mapel) {
            return $this->errorResponse(null, 'Data mapel Tidak Ada!');
        }
        $mapel->delete();

        return $this->successResponse(null, 'Data mapel Dihapus!');
    }
}