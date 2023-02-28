<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasiweb extends Model
{
    use HasFactory;
    protected $table = 'konfigurasi_web';

    public function getLogoApp(){
        if(!$this->logo_aplikasi){
            return asset('images/noimage.png');
        }
        return asset('images/'.$this->logo_aplikasi);
    }

    public function getFavicon(){
        if(!$this->favicon){
            return asset('images/noimage.png');
        }
        return asset('images/'.$this->favicon);
    }

    public function getLogoKecil(){
        if(!$this->logo_kecil){
            return asset('images/noimage.png');
        }
        return asset('images/'.$this->logo_kecil);
    }

    public function getGambarSidebar(){
        if(!$this->gambar_sidebar){
            return asset('images/noimage.png');
        }
        return asset('images/'.$this->gambar_sidebar);
    }
}
