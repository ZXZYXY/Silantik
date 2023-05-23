<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Video extends Model
{
    use HasFactory;
    use Uuid;
    protected $table = 'video';
    protected $fillable = ['judul', 'link_video', 'published', 'uuid'];
}
