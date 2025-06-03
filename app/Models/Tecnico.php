<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnicos';

    protected $fillable = [
        'cedula',
        'nombre',
    ];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'tecnico_cedula', 'cedula');
    }

}
