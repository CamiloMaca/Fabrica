<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'motivo',
    ];

    protected $allowIncluded = [
        'user',
        'tipoTransaccion'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function TipoTransaccion()
    {
        return $this->belongsTo(TipoTransaccion::class);
    }

    //

    public function scopeIncluded(Builder $query): Builder
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return $query; // Continue without any included relations
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        $relations = array_filter($relations, fn($relationship) => $allowIncluded->contains($relationship));

        return $query->with($relations);
    }

    
    
}
