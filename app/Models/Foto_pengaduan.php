<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto_pengaduan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'foto_pengaduan';
    protected $guarded = [];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
