<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Plano;


class PlanoObserver
{
    /**
     * Handle the plano "created" event.
     *
     * @param  \App\Models\Plano  $plano
     * @return void
     */
    public function creating(Plano $plano)
    {
        $plano->url = Str::kebab($plano->nome);
    }

    /**
     * Handle the plano "updated" event.
     *
     * @param  \App\Models\Plano  $plano
     * @return void
     */
    public function saving(Plano $plano)
    {
        $plano->url = Str::kebab($plano->nome);
    }

}
