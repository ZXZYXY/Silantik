<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Opd extends Model
{
    use Uuid;
    use HasFactory;

    protected $table = 'opd';
    protected $fillable = ['nama_opd', 'singkatan', 'uuid'];

    public function daftaraplikasi()
    {
        return $this->hasMany('App\Models\Daftaraplikasi');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
