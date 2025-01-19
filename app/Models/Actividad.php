<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'dia',
        'imagen',
    ];

    protected $table = 'actividades';

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }
}