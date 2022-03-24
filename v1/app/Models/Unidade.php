<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidades';

    protected $fillable = ['nome', 'sigla', 'empresa_id', 'unidade_superior_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function unidades_subordinadas()
    {
        return $this->hasMany(Unidade::class);
    }

    public function unidade_superior()
    {
        return $this->belongsTo(Unidade::class, 'unidade_superior_id');
    }


}
