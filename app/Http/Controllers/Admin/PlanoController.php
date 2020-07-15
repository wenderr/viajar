<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plano;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlano;

class PlanoController extends Controller
{
    private $repository;

    public function __construct(Plano $plano)
    {
        $this->repository = $plano;
    }


    public function index()
    {

        $planos = $this->repository->latest()->paginate(10);

        return view('admin.pages.planos.index', [
            'planos' => $planos,
        ]);

    }

    public function create()
    {

            return view('admin.pages.planos.create');

    }

    public function store(StoreUpdatePlano $request)
    {
             
          $this->repository->create($request->all());
          return redirect()->route('planos.index');

    }

    public function show($url)
    {
        $plano = $this->repository->where('url', $url)->first();

        if (!$plano)
        return redirect()->back();

            return view('admin.pages.planos.show', [
                'plano' => $plano
            ]);

    }

    public function destroy($url)
    {
        $plano = $this->repository->where('url', $url)->first();

        if (!$plano)
        return redirect()->back();

          $plano->delete();
          return redirect()->route('planos.index');

    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

           $planos = $this->repository->search($request->filter);

           return view('admin.pages.planos.index', [
            'planos' => $planos,
            'filters' => $filters,
        ]);

    }

    public function edit($url)
    {
        $plano = $this->repository->where('url', $url)->first();

        if (!$plano)
        return redirect()->back();

          return view('admin.pages.planos.edit', [
              'plano' => $plano
          ]);

    }

    public function update(StoreUpdatePlano $request, $url)
    {
        $plano = $this->repository->where('url', $url)->first();

        if (!$plano)
        return redirect()->back();

        $plano->update($request->all());
        return redirect()->route('planos.index');
        
    }

}
