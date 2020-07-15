@extends('adminlte::page')

@section('title', "Detalhe do Planos {{ $plano->nome }}")

@section('content_header')
<h1>Detalhes do Plano <b>{{ $plano->nome }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $plano->nome }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $plano->url }}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{ number_format($plano->preco, 2, ',','.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $plano->descricao }}
                </li>
            </ul>
        
        <form action="{{ route('planos.destroy', $plano->url) }}" method="POST">
            @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETAR O PLANO <i class="fas fa-trash-alt"></i></button>
    </form>
           
        </div>
    </div>
 @endsection
    