<?php

namespace App\Models;

use App\Models\Plano;
use Illuminate\Database\Eloquent\Model;

class DetalhePlano extends Model
{
    protected $table = 'detalhes_plano';

    protected $fillable = ['nome'];

    public function plano()
    {
        $this->belongsTo(Plano::class);
    }
}
