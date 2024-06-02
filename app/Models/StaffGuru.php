<?php

namespace App\Models;

use App\Models\Mapel;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffGuru extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mapel(){
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}