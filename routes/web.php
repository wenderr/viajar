<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function() {

// Rotas Detalhes
Route::get('planos/{url}/detalhes/create', 'DetalhePlanoController@create')->name('detalhes.plano.create');
Route::get('planos/{url}/detalhes/{idDetalhe}', 'DetalhePlanoController@show')->name('detalhes.plano.show');
Route::delete('planos/{url}/detalhes/{idDetalhe}', 'DetalhePlanoController@destroy')->name('detalhes.plano.destroy');
Route::put('planos/{url}/detalhes/{idDetalhe}', 'DetalhePlanoController@update')->name('detalhes.plano.update');
Route::get('planos/{url}/detalhes/{idDetalhe}/edit', 'DetalhePlanoController@edit')->name('detalhes.plano.edit');
Route::post('planos/{url}/detalhes', 'DetalhePlanoController@store')->name('detalhes.plano.store');
Route::get('planos/{url}/detalhes', 'DetalhePlanoController@index')->name('detalhes.plano.index');



// Rotas Planos
    Route::get('planos/create', 'PlanoController@create')->name('planos.create');
    Route::put('planos/{url}', 'PlanoController@update')->name('planos.update');
    Route::get('planos/{url}/edit', 'PlanoController@edit')->name('planos.edit');
    Route::any('planos/search', 'PlanoController@search')->name('planos.search');
    Route::delete('planos/{url}', 'PlanoController@destroy')->name('planos.destroy');
    Route::get('planos/{url}', 'PlanoController@show')->name('planos.show');
    Route::post('planos', 'PlanoController@store')->name('planos.store');    
    Route::get('planos', 'PlanoController@index')->name('planos.index');
    
    // Home Administrador
    Route::get('/', 'PlanoController@index')->name('admin.index');
});



Route::get('/', function () {
    return view('welcome');
});
