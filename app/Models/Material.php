<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Actividad;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    protected $table = 'materiales';

    public function ocupados(): BelongsToMany
    {
        return $this->belongsToMany(Actividad::class, 'materialesocupados', 'material_id', 'actividad_id')
                    ->as('ocupados')
                    ->withPivot('cantidad','valor', 'medida', 'activo')
                    ->withTimestamps();;
    }
    public function reservados(): BelongsToMany
    {
        return $this->belongsToMany(Actividad::class, 'materialesreservados', 'material_id', 'actividad_id')
                    ->as('reservados')
                    ->withPivot('cantidad','valor', 'medida_id')
                    ->withTimestamps();;
    }

    
    public function compras(): BelongsToMany
    {
        return $this->belongsToMany(Proveedor::class, 'compras', 'material_id', 'proveedor_id')
                    ->as('compras')
                    ->withPivot('cantidad','valor_unitario', 'fecha_compra', 'factura')
                    ->withTimestamps();
    }

    public function esmedida(): BelongsTo
    {
        return $this->belongsTo(Medida::class, 'medida');
    }


}
