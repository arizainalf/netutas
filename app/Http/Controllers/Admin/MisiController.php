<?php

namespace App\Http\Controllers\Admin;

use App\Models\Misi;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MisiController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $misis = Misi::all();
            if ($request->mode == "datatable") {
                return DataTables::of($misis)
                    ->addColumn('action', function ($misi) {
                        $editButton = '<button class="btn btn-sm btn-warning d-inline-flex  align-items-baseline  mr-1" onclick="getModal(`createModal`, `/admin/misi/' . $misi->id . '`, [`id`, `misi`])"><i class="fas fa-edit mr-1"></i>Edit</button>';
                        $deleteButton = '<button class="btn btn-sm btn-danger d-inline-flex  align-items-baseline " onclick="confirmDelete(`/admin/misi/' . $misi->id . '`, `misi-table`)"><i class="fas fa-trash mr-1"></i>Hapus</button>';
                        return $editButton . $deleteButton;
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return $this->successResponse($misis, 'Data Misi ditemukan.');
        };

        return view('admin.misi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'misi' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }

        $misi = Misi::create([
            'misi' => $request->misi,
        ]);

        return $this->successResponse($misi, 'Data Misi Disimpan!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Misi = Misi::find($id);

        if (!$Misi) {
            return $this->errorResponse(null, 'Data Misi Tidak Ada!');
        }

        return $this->successResponse($Misi, 'Data Misi Ditemukan!');
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
            'misi' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 'Data tidak valid.', 422);
        }
        $misi = Misi::find($id);

        if (!$misi) {
            return $this->errorResponse(null, 'Data Misi Tidak Ada!');
        }

        $updateMisi = [
            'misi' => $request->misi,
        ];
        
        $misi->update($updateMisi);

        return $this->successResponse($misi, 'Data Misi Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $misi = Misi::find($id);

        if (!$misi) {
            return $this->errorResponse(null, 'Data Misi Tidak Ada!');
        }
        $misi->delete();

        return $this->successResponse(null, 'Data Misi Dihapus!');
    }
}