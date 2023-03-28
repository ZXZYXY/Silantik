<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Berita extends Model
{
    use Uuid;
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = ['judul', 'isi', 'published', 'uuid', 'kategori', 'gambar', 'user_id'];

    public function getImageBerita()
    {
        if (!$this->gambar) {
            return asset('images/berita/no-berita.jpg');
        }
        return asset('images/berita/' . $this->gambar);
    }

    public function getThumbnailBerita()
    {
        if (!$this->gambar) {
            return asset('images/berita/no-berita.jpg');
        }
        return asset('images/berita/thumb/' . $this->gambar);
    }
}
