<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Pengaduan extends Model
{
    use Uuid, HasFactory;

    protected $table = 'pengaduan';
    protected $guard = [];

    // Relasi ke tabel foto_pengaduan
    public function foto_pengaduan()
    {
        return $this->hasMany(Foto_pengaduan::class);
    }

    // Relasi ke tabel opd
    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opd_id', 'id');
    }
}