<?php

namespace App\Http\Controllers\Admin;

use App\Models\StaffGuru;
use Illuminate\Http\Request;
use App\Traits\JsonResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StaffGuruController extends Controller
{
    use JsonResponder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $staffGurus = StaffGuru::with('mapel','jabatan')->get();
            if ($request->mode == "datatable") {
                return DataTables::of($staffGurus)
                    ->addColumn('action', function ($staffGuru) {
                        $editButton = '<button class="btn btn-sm btn-warning d-inline-flex  align-items-baseline  mr-1" onclick="getModal(`createModal`, `/admin/staff/' . $staffGuru->id . '`, [`id`, `nama`, `id_jabatan`,`id_mapel`])"><i class="fas fa-edit mr-1"></i>Edit</button>';
                        $deleteButton = '<button class="btn btn-sm btn-danger d-inline-flex  align-items-baseline " onclick="confirmDelete(`/admin/staff/' . $staffGuru->id . '`, `staff-table`)"><i class="fas fa-trash mr-1"></i>Hapus</button>';
                        return $editButton . $deleteButton;
                    })
                    ->addColumn('image', function ($staffGuru) {
                        return '<img src="/storage/img/staff/' . $staffGuru->image . '" width="150px" alt="">';
                    })
                    ->addColumn('jabatan', function ($staffGuru) {
                        return $staffGuru->jabatan->nama;
                    })
                    ->addColumn('mapel', function ($staffGuru) {
                        return $staffGuru->mapel->nama;
                    })
                    ->addIndexColumn()
                    ->rawColumns(['image','jabatan','mapel','action'])
                    ->make(true);
            }

            return $this->successResponse($staffGurus, 'Data ditemukan.');
        };

        return view('admin.staff.index');
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

        if ($request->hasFile('image')) {
            // Jika ada image yang diunggah, simpan image
            $image = $request->file('image')->hashName();
            $request->file('image')->storeAs('public/img/staff', $image);
        }else{
            $image = 'staff.png';
        }
        $staffGuru = StaffGuru::create([
            'image' => $image,
            'nama' => $request->nama,
            'id_mapel' => $request->id_mapel,
            'id_jabatan' => $request->id_jabatan,
        ]);
        return $this->successResponse($staffGuru, 'Data Disimpan!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staffGuru = StaffGuru::find($id);

        if (!$staffGuru) {
            return $this->errorResponse(null, 'Data Tidak Ada!');
        }

        return $this->successResponse($staffGuru, 'Data Ditemukan!');
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
    
    $staffGuru = StaffGuru::find($id);

    if (!$staffGuru) {
        return $this->errorResponse(null, 'Data Tidak Ada!');
    }

    $updateStaff = [
        'nama' => $request->nama,
        'id_jabatan' => $request->id_jabatan,
        'id_mapel' => $request->id_mapel,
    ];

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika bukan gambar default
        if ($staffGuru->image != 'staff.png') {
            Storage::delete('public/img/staff/' . $staffGuru->image);
        }

        // Simpan gambar baru
        $image = $request->file('image')->hashName();
        $request->file('image')->storeAs('public/img/staff', $image);
        $updateStaff['image'] = $image;
    }
    
    $staffGuru->update($updateStaff);

    return $this->successResponse($staffGuru, 'Data Diubah!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staffGuru = StaffGuru::find($id);

        if (!$staffGuru) {
            return $this->errorResponse(null, 'Data Tidak Ada!');
        }
        $staffGuru->delete();

        return $this->successResponse(null, 'Data Dihapus!');
    }
}