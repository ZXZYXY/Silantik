<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Jenisaplikasi extends Model
{
    use Uuid;
    use HasFactory;

    protected $table = 'jenis_aplikasi';
    protected $fillable = ['nama_jenis'];
}
