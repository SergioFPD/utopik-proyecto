<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'adultos',
        'menores',
        'confirmado',
        'puntuacion',
        'experiencia_id',
        'exp_fecha_id',
        'user_id'
    ];

    public function dimePrecioTotal(){

        $adultos = $this->adultos;
        $precioAdulto = $this->experiencia->precio_adulto;
        return $adultos*$precioAdulto;

    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    public function exp_fecha()
    {
        return $this->belongsTo(Exp_fecha::class);
    }
}
