<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'email',
        'sucursal',
        'solicitado_por',
        'encargado',
        'area_afectacion',
        'descripcion',
        'archivo',
        'observaciones',
        'motivo_rechazo',
        'hora_ingreso',
        'hora_salida',
        'observaciones_tecnico',
        'requiere_repuesto',
        'foto_factura',
        'foto_trabajo',
        'firma',
        'fecha_corregida',
        'estado',
        'prioridad',
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
