<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'buses';
    protected $primaryKey = 'id_bus';
    protected $fillable = [
        'placa',
        'aforo',
        'id_empresa',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id_empresa');
    }

    public function chofer()
    {
        return $this->hasOne(Chofer::class, 'id_bus', 'id_bus');
    }

    public function viajes()
    {
        return $this->hasOne(Viaje::class, 'id_bus', 'id_bus');
    }
}
