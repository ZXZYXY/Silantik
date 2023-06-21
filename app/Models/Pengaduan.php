<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Pengaduan extends Model
{
    use Uuid;
    use HasFactory;
    protected $table = 'pengaduan';
    protected $guard = [];

    public function foto_pengaduan()
    {
        return $this->hasMany(Foto_pengaduan::class);
    }
}
