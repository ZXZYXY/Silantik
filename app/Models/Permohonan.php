<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Permohonan extends Model
{
    use Uuid;
    use HasFactory;
    protected $table = 'permohonan';
    protected $guard = [];
}
