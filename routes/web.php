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

/**
 * route out
 */
Route::get('keluar', function(){
    \Auth::logout();
    return redirect('/');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function()
{
    //route biodata
    Route::get('biodata','Dashboard\Biodata_controller@index');
    Route::post('biodata/add/{id}','Dashboard\Biodata_controller@store');
    Route::put('biodata/update/{id}','Dashboard\Biodata_controller@update');

    Route::get('biodata/show','Dashboard\Biodata_controller@show');
    Route::get('biodata/edit/{id}','Dashboard\Biodata_controller@edit');
    Route::put('biodata/data-update/{id}','Dashboard\Biodata_controller@update');
    Route::get('biodata/hapus/{id}','Dashboard\Biodata_controller@delete');

    //route bulan
    Route::get('bulan','Dashboard\Bulan_controller@index');
    Route::post('bulan/add','Dashboard\Bulan_controller@store');

    //route buy
    Route::get('spp','Dashboard\Buy_controller@index');
    Route::post('spp/add','Dashboard\Buy_controller@store');

    Route::get('spp/show','Dashboard\Buy_controller@show');
    Route::get('siswa/show/{id}','Dashboard\Buy_controller@siswa_show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
