<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Proveedor;
use App\Models\Material;

class Compra extends Model
{
    protected $table = 'compras';

    public function proveedor(): HasOne
    {
        return $this->hasOne(Proveedor::class, 'id', 'proveedor_id');
    }

    public function material(): HasOne
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }
    public function medida(): HasOne
    {
        return $this->hasOne(Medida::class, 'id', 'medida_id');
    }
}
