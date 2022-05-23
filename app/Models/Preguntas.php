<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primarykey = "id"; 

    protected $fillable = [
        'pregunta',
        'opcion1',
        'opcion2',
        'opcion3',
        'correcta',
        'idExamen',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
}
