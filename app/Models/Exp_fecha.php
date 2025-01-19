<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exp_fecha extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
    ];

    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }
}
