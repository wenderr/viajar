@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Administrador</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('planos.index') }}">Planos</a></li>
    </ol>

<h1>Planos <a href="{{ route('planos.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-circle"></i></a></h1>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        <form action="{{ route('planos.search') }}" method="POST" class="form form-inline">
                @csrf
        <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-secondary">Filtrar</button>

            </form>

        </div>
        <div class="card-body">
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th style="width: 50px">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($planos as $plano)
    <tr>
        <td>
            {{ $plano->nome }}
        </td>
        <td>
            R$ {{ number_format($plano->preco, 2, ',','.') }}
        </td>
        <td>
            {{ $plano->descricao }}
        </td>
        <td style="width: 250px">
            <a href="{{ route('detalhes.plano.index', $plano->url) }}" class="btn btn-primary">Detalhes</a>
            <a href="{{ route('planos.edit', $plano->url) }}" class="btn btn-info">Editar</a>
            <a href="{{ route('planos.show', $plano->url) }}" class="btn btn-warning">Ver</a>
        </td>       
    </tr>
        @endforeach
    </tbody>
</table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
            {!! $planos->appends($filters)->links() !!}
                @else
                {!! $planos->links() !!}
            @endif
            
        </div>
        
    </div>
@stop