<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Devices
Route::group(['prefix' => 'devices'], function () {

    $controller = 'DevicesController';

    Route::get('', "$controller@index")
         ->name('devices.index');

    Route::get('create', "$controller@create")
         ->name('devices.create');
    Route::post('store', "$controller@store")
         ->name('devices.store');

    Route::get('edit/{id}', "$controller@edit")
         ->name('devices.edit');
    Route::put('update/{id}', "$controller@update")
         ->name('devices.update');

    Route::get('delete/{id}', "$controller@delete")
         ->name('devices.delete');
    Route::delete('destroy/{id}', "$controller@destroy")
         ->name('devices.destroy');
});
//Types
Route::group(['prefix' => 'types'], function () {

    $controller = 'TypesController';

    Route::get('', "$controller@index")
        ->name('types.index');

    Route::get('create', "$controller@create")
        ->name('types.create');
    Route::post('store', "$controller@store")
        ->name('types.store');

    Route::get('edit/{id}', "$controller@edit")
        ->name('types.edit');
    Route::put('update/{id}', "$controller@update")
        ->name('types.update');

    Route::get('delete/{id}', "$controller@delete")
        ->name('types.delete');
    Route::delete('destroy/{id}', "$controller@destroy")
        ->name('types.destroy');
});
//Components
Route::group(['prefix' => 'components'], function () {

    $controller = 'ComponentsController';

    Route::get('', "$controller@index")
        ->name('components.index');

    Route::get('create', "$controller@create")
        ->name('components.create');
    Route::post('store', "$controller@store")
        ->name('components.store');

    Route::get('edit/{id}', "$controller@edit")
        ->name('components.edit');
    Route::put('update/{id}', "$controller@update")
        ->name('components.update');

    Route::get('delete/{id}', "$controller@delete")
        ->name('components.delete');
    Route::delete('destroy/{id}', "$controller@destroy")
        ->name('components.destroy');
});