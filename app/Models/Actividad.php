<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actividad extends Model
{
    protected $table = 'actividades';
    
    public function ocupados(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'materialesocupados', 'actividad_id', 'material_id')
                    ->as('ocupados')
                    ->withPivot('cantidad','valor', 'medida', 'activo')
                    ->withTimestamps();;
    }
    public function reservados(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'materialesreservados', 'actividad_id', 'material_id')
                    ->as('reservados')
                    ->withPivot('cantidad','valor', 'medida', 'activo')
                    ->withTimestamps();;
    }

    
}
