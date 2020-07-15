@extends('adminlte::page')

@section('title', "'Editar o Plano - {$plano->nome}")

@section('content_header')
<h1>Editar o Plano - {{ $plano->nome }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{ route('planos.update', $plano->url) }}" class="form" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.planos._partials.form')

            </form>
        </div>
    </div>
 @endsection
    