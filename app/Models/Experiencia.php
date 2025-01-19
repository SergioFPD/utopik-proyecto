<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'vip',
        'activa',
        'duracion',
        'precio_adulto',
        'precio_nino',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function actividad()
    {
        return $this->hasMany(Actividad::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }

    public function exp_fecha()
    {
        return $this->hasMany(Exp_fecha::class);
    }

    public function imagen()
    {
        return $this->hasMany(Imagen::class);
    }

}
