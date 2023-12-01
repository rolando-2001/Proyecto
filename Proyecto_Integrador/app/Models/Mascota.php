<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{  
    
    use HasFactory;

    protected $fillable=[
        'nombre' ,
        'edad' ,
        'raza_mascotas_id',
        'tipo_mascotas_id',
        'genero',
        'fecha',
        'descripcion',
        'imagen' ,
        'user_id'

    ];



    
}
