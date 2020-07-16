<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plano;
use App\Models\DetalhePlano;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetalhesPlano;

class DetalhePlanoController extends Controller
{
    private $repository, $plano;

    public function __construct(DetalhePlano $detalhePlano, Plano $plano)
    {
        $this->repository = $detalhePlano;
        $this->plano = $plano;
    }


    public function index($urlPlano)
    {
        if (!$plano = $this->plano->where('url', $urlPlano)->first()) {
                return redirect()->back();
        }
            
        //$detalhes = $plano->detalhes();
        $detalhes = $plano->detalhes()->paginate();

        return view('admin.pages.planos.detalhes.index', [
            'plano' => $plano,
            'detalhes' => $detalhes,
        ]);
    }

    public function create($urlPlano)
    {
        if (!$plano = $this->plano->where('url', $urlPlano)->first()) {
            return redirect()->back();
    }
            return view('admin.pages.planos.detalhes.create', [
                'plano' => $plano,
            ]);

    }

    public function store(StoreUpdateDetalhesPlano $request, $urlPlano)
    {
        if (!$plano = $this->plano->where('url', $urlPlano)->first()) {
            return redirect()->back();
    }
           // dd($request->all()); 
          $plano->detalhes()->create($request->all());
          return redirect()->route('detalhes.plano.index', $plano->url);

    }

    public function edit($urlPlano, $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->repository->find($idDetalhe);

        if (!$plano || !$detalhe) {
        return redirect()->back();
        }
          return view('admin.pages.planos.detalhes.edit', [
              'plano' => $plano,
              'detalhe' => $detalhe,
          ]);       

    }

    public function update(StoreUpdateDetalhesPlano $request, $urlPlano, $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->repository->find($idDetalhe);

        if (!$plano || !$detalhe) {
        return redirect()->back();
        }
        $detalhe->update($request->all());
        return redirect()->route('detalhes.plano.index', $plano->url);

    }


    public function destroy($urlPlano, $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->repository->find($idDetalhe);

        if (!$plano || !$detalhe) {
        return redirect()->back();
        }
        $detalhe->delete();
        return redirect()
                    ->route('detalhes.plano.index', $plano->url) 
                    ->with('message', 'Detalhe deletado com sucesso!');     

    }

    public function show($urlPlano, $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->repository->find($idDetalhe);

        if (!$plano || !$detalhe) {
        return redirect()->back();
        }
        return view('admin.pages.planos.detalhes.show', [
            'plano' => $plano,
            'detalhe' => $detalhe,
        ]);     

    }
}
