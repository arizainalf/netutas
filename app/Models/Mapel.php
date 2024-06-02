<?php

namespace App\Models;

use App\Models\StaffGuru;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staffGurus(){
        return $this->hasMany(StaffGuru::class);
    }
}