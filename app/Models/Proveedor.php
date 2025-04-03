<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Material;

class Proveedor extends Model
{
   
    protected $table = 'provedores';
    
    public function compras(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'compras', 'material_id', 'proveedor_id')
                    ->as('compras')
                    ->withPivot('cantidad','valor_unitario', 'fecha_compra', 'factura')
                    ->withTimestamps();
    }

}
