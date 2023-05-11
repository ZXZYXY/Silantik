<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Daftaraplikasi extends Model
{
    use HasFactory;
    use Uuid;
    protected $table = 'daftaraplikasi';
    protected $guard = [];

    public function opd()
    {
        return $this->belongsTo('App\Models\Opd');
    }
}
