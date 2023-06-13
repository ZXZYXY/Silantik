<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historipermohonan extends Model
{
    use HasFactory;
    protected $table = 'histori_permohonan';
    protected $fillable = ['permohonan_id', 'status', 'keterangan_status'];
}
