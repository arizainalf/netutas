<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jabatans = Jabatan::all();
            if ($request->mode == "datatable") {
                return DataTables::of($jabatans)
                    ->addColumn('action', function ($jabatan) {
                        $editButton = '<button class="btn btn-sm btn-warning d-inline-flex  align-items-baseline  mr-1" onclick="getModal(`createModal`, `/admin/jabatan/' . $jabatan->id . '`, [`id`, `nama`])"><i class="fas fa-edit mr-1"></i>Edit</button>';
                        $deleteButton = '<button class="btn btn-sm btn-danger d-inline-flex  align-items-baseline " onclick="confirmDelete(`/admin/jabatan/' . $jabatan->id . '`, `jabatan-table`)"><i class="fas fa-trash mr-1"></i>Hapus</button>';
                        return $editButton . $deleteButton;
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return $this->successResponse($jabatans, 'Data jabatan ditemukan.');
        };

        return view('admin.jabatan.index');
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

        $jabatan = Jabatan::create([
            'nama' => $request->nama,
        ]);

        return $this->successResponse($jabatan, 'Data jabatan Disimpan!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return $this->errorResponse(null, 'Data jabatan Tidak Ada!');
        }

        return $this->successResponse($jabatan, 'Data jabatan Ditemukan!');
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
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return $this->errorResponse(null, 'Data Jabatan Tidak Ada!');
        }

        $updatejabatan = [
            'nama' => $request->nama,
        ];
        
        $jabatan->update($updatejabatan);

        return $this->successResponse($jabatan, 'Data Jabatan Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return $this->errorResponse(null, 'Data jabatan Tidak Ada!');
        }
        $jabatan->delete();

        return $this->successResponse(null, 'Data jabatan Dihapus!');
    }
}