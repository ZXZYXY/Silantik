<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Team extends Model
{
    use Uuid;
    use HasFactory;
    protected $guard = [];

    public function getImageTeam()
    {
        if (!$this->foto) {
            return asset('images/foto_team/no-image.png');
        }
        return asset('images/foto_team/' . $this->foto);
    }

    public function daftaraplikasi()
    {
        return $this->hasMany('App\Models\Daftaraplikasi');
    }
}
