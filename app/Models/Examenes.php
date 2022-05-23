<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examenes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primarykey = "id"; 

    protected $fillable = [
        'titulo',
        'idUsuario',
    ];
}
