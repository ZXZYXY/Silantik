<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Foto extends Model
{
    use HasFactory;
    use Uuid;
    protected $table = 'foto';
    protected $fillable = ['gambar', 'keterangan', 'album_id', 'published', 'uuid'];

    public function getImageFoto()
    {
        if (!$this->gambar) {
            return asset('images/foto/no-foto.jpg');
        }
        return asset('images/foto/' . $this->gambar);
    }

    public function getThumbnailFoto()
    {
        if (!$this->gambar) {
            return asset('images/foto/no-foto.jpg');
        }
        return asset('images/foto/thumb/' . $this->gambar);
    }
}
