<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function infoUsuarios()
    {
        return $this->hasMany(Userinfo::class, 'ciudad_id');
    }
}
