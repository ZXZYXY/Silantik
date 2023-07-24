<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class File_pendukung extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'file_pendukung';
    protected $guarded = [];
}
