<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Material;
use App\Models\Actividad;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ocupado extends Model
{
    protected $table = 'materialesocupados';

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class, 'actividad_id');
    }


}
