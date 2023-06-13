<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Statuspermohonan extends Model
{
    use Uuid;
    use HasFactory;
    protected $table = 'status_permohonan';
    protected $fillable = ['nama_status'];
}
