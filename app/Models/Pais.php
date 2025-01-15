<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    protected $guarded = [];

    public function ciudad()
    {
        return $this->hasOne(Ciudad::class);
    }
}
