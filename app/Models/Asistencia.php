<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = 'asistencias';
	protected $fillable = [
        'estado',
        'trabajador_id',
        'fecha',
        'entrada',
        'salida'

    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }

}
