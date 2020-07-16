<?php

namespace App\Models;

use App\Models\DetalhePlano;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['nome', 'url', 'preco', 'descricao'];

   public function detalhes()
   {
            
           return $this->hasMany(DetalhePlano::class);
       
   }     


    public function search($filter = null)
    {

           $results = $this->where('nome', 'LIKE', "%{$filter}%")
                           ->orWhere('descricao', 'LIKE', "%{$filter}%")
                           ->paginate();
            return $results;

    }
}

