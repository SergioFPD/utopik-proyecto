<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    // Tabla a la que se refiere (porque en este caso se añade -es a ciudad)
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
