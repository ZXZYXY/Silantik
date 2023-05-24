<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use Uuid;
    use HasFactory;
    use Sluggable;

    protected $table = 'berita';
    protected $fillable = ['judul', 'slug', 'isi', 'published', 'uuid', 'kategori', 'gambar', 'user_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

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

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }
}
