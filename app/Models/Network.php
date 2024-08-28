<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $table = 'network';
    protected $guarded = []; // Pastikan menggunakan guarded yang benar

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'opd_id'); // Sesuaikan nama foreign key jika perlu
    }
}