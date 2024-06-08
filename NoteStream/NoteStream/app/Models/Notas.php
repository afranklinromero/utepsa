<?php
// app/Models/Notas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $table = 'notas';

    protected $primaryKey = 'IDNota';

    protected $fillable = [
        'Titulo',  // Updated to match migration
        'Contenido',  // Updated to match migration
        'IDUsuario',  // Updated to match migration
    ];

    public function user() {
        return $this->belongsTo(User::class, 'IDUsuario');
    }
}
