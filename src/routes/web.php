<?php

use App\Jobs\SendEmailJob;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', ['as' => 'test.index', 'uses' => 'TestController@index']);

Route::group([
    'prefix' => 'cars',
], function () {
    Route::get('/', 'CarsController@index')
         ->name('cars.car.index');
    Route::get('/create','CarsController@create')
         ->name('cars.car.create');
    Route::get('/show/{car}','CarsController@show')
         ->name('cars.car.show')->where('id', '[0-9]+');
    Route::get('/{car}/edit','CarsController@edit')
         ->name('cars.car.edit')->where('id', '[0-9]+');
    Route::post('/', 'CarsController@store')
         ->name('cars.car.store');
    Route::put('car/{car}', 'CarsController@update')
         ->name('cars.car.update')->where('id', '[0-9]+');
    Route::delete('/car/{car}','CarsController@destroy')
         ->name('cars.car.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'categories',
], function () {
    Route::get('/', 'CategoriesController@index')
         ->name('categories.category.index');
    Route::get('/create','CategoriesController@create')
         ->name('categories.category.create');
    Route::get('/show/{category}','CategoriesController@show')
         ->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit','CategoriesController@edit')
         ->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', 'CategoriesController@store')
         ->name('categories.category.store');
    Route::put('category/{category}', 'CategoriesController@update')
         ->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}','CategoriesController@destroy')
         ->name('categories.category.destroy')->where('id', '[0-9]+');
});

Route::get('email-test', function(){
     $details['email'] = 'evulgation@31755155.com';

    dispatch(new SendEmailJob($details));


    dd('done');
});
