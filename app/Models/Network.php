<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;
    use Uuid;
    protected $table = 'network';
    protected $guard = [];

    public function opd()
    {
        return $this->belongsTo('App\Models\Opd');
    }
}
