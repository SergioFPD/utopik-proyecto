<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades';

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
