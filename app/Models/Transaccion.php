<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'tipo_transaccion_id',
        'fecha',
        'monto',
        'motivo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function TipoTransaccion()
    {
        return $this->belongsTo(TipoTransaccion::class);
    }
}
