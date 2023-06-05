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
            return asset('images/foto_team/no-berita.jpg');
        }
        return asset('images/foto_team/' . $this->foto);
    }
}
