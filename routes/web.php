<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login1');
});

Auth::routes();
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/home', 'HomeController@index')->name('home');
    Route::get('/admin/allUser', 'AdminController@index');
    Route::get('/admin/export', 'AdminController@export');
    Route::get('/admin/exportSiswa', 'AdminController@exportSiswa');
    Route::get('/admin/exportGuru', 'AdminController@exportGuru');
    Route::post('/admin/importSiswa', 'AdminController@importSiswa');
    Route::get('/admin/pemOsis', 'AdminController@pemOsis');
    Route::post('/admin/simpanKandidat', 'AdminController@simpanKandidat');
    Route::get('/admin/chart', 'AdminController@chart');
    Route::get('/admin/delKandidat/{id}', 'AdminController@delKandidat');
});

Route::group(['middleware' => ['guru']], function () {
    Route::get('/guru/home', 'HomeController@index')->name('home');
    Route::get('/guru/vote', 'GuruController@index');
    Route::get('/guru/pemOsis', 'GuruController@PemOsis');
    Route::get('/guru/pemMpk', 'GuruController@pemMpk');
    Route::post('/guru/votes', 'GuruController@saveVote');
    Route::post('/guru/votesMpk', 'GuruController@saveVoteMpk');
    Route::get('/guru/finish', 'GuruController@finish');
});

Route::group(['middleware' => ['siswa']], function () {
    Route::get('/siswa/home', 'HomeController@index');
    Route::get('/siswa/vote', 'SiswaController@index');
    Route::get('/siswa/pemOsis', 'SiswaController@PemOsis');
    Route::get('/siswa/pemMpk', 'SiswaController@pemMpk');
    Route::post('/siswa/votes', 'SiswaController@saveVote');
    Route::post('/siswa/votesMpk', 'SiswaController@saveVoteMpk');
    Route::get('/siswa/finish', 'SiswaController@finish');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
