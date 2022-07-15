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

Route::get('/','Auth\LoginController@index')->name('login');
Route::post('/login','Auth\LoginController@authenticate')->name('log_in');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
  Route::middleware(['auth'])->group(function () {

      Route::get('/home', 'HomeController@index')->name('home');

      //alternatif
      Route::get('/alternatif','AlternatifController@index');
      Route::get('/alternatif-table','AlternatifController@readTable')->name('alter_table');
      Route::post('/alternatif','AlternatifController@store')->name('alter_add');
      Route::get('/alternatif-edit/{alternatif}','AlternatifController@edit');
      Route::post('/alternatif/{id}','AlternatifController@update');
      Route::delete('/alternatif/{id}','AlternatifController@destroy');
      Route::get('/form-kriteria','AlternatifController@readForm')->name('showForm');
      Route::get('/form-kriteria-edit/{id}','AlternatifController@readFormEdit');

      //kriteria
      Route::get('/kriteria','KriteriaController@index');
      Route::get('/kriteria-table','KriteriaController@readKriteria')->name('kriteria_table');
      Route::post('/kriteria','KriteriaController@store')->name('kriteria_add');
      Route::get('/kriteria-edit/{id}','KriteriaController@edit');
      Route::post('/kriteria/{id}','KriteriaController@update');
      Route::delete('/kriteria/{id}','KriteriaController@destroy');
      //perhitungan saw
      Route::get('/perhitungan-saw','NilaiController@index');
      Route::get('/matrix-X','NilaiController@matrixX');
      Route::get('/hitungSaw','NilaiController@hitungSaw');
      Route::get('/print','NilaiController@print');
    
      Route::get('/coba','KriteriaController@fetchData');
      
   });


