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
                    ->withPivot('material_id','cantidad','valor', 'medida_id', 'por_devolver', 'devolucion')
                    ->withTimestamps();;
    }
    public function reservados(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'materialesreservados', 'actividad_id', 'material_id')
                    ->as('reservados')
                    ->withPivot('id','cantidad','valor', 'medida_id')
                    ->withTimestamps();;
    }

    
}
