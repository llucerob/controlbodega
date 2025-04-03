<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Material;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medida extends Model
{
    protected $table = 'medidas';

    public function materiales(): HasMany
    {
        return $this->hasMany(Material::class, 'medida_id');
    }
}
