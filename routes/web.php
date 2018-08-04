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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/acompanhantes/cadastrar', 'AcompanhanteController@cadastrar')->name('acompanhante.cadastrar');
Route::post('/acompanhantes/cadastrar', 'AcompanhanteController@submit')->name('acompanhante.salvar');
Route::get('/acompanhantes', 'AcompanhanteController@show')->name('Acompanhantes');
Route::get('/acompanhantes/load', 'AcompanhanteController@load')->name('Acompanhantes.load');
Route::get('/acompanhantes/pdf', 'AcompanhanteController@generatePDF')->name('Acompanhantes.pdf');

Route::get('/alunos/cadastrar', 'AlunoController@cadastrar')->name('aluno.cadastrar');
Route::post('/alunos/cadastrar', 'AlunoController@submit')->name('aluno.salvar');
Route::get('/alunos', 'AlunoController@show')->name('Alunos');
Route::get('/alunos/load', 'AlunoController@load')->name('alunos.load');
Route::get('/alunos/pdf','AlunoController@generatePDF')->name('alunos.pdf');;
