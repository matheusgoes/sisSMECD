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
Route::post('/acompanhantes/cadastrar', 'AcompanhanteController@save_submit')->name('acompanhante.salvar');
Route::get('/acompanhantes/delete/{id}', 'AcompanhanteController@delete')->name('acompanhante.delete');
Route::get('/acompanhantes/editar/{id}', 'AcompanhanteController@editar')->name('acompanhante.editar');
Route::post('/acompanhantes/editar/{id}', 'AcompanhanteController@edit_submit')->name('acompanhante.editar');
Route::get('/acompanhantes', 'AcompanhanteController@show')->name('Acompanhantes');
Route::get('/acompanhantes/load', 'AcompanhanteController@load')->name('Acompanhantes.load');
Route::post('/acompanhantes/load', 'AcompanhanteController@load')->name('Acompanhantes.load');
Route::get('/acompanhantes/pdf', 'AcompanhanteController@generatePDF')->name('Acompanhantes.pdf');
Route::get('/acompanhantes/pdf2/{ids}','AcompanhanteController@generatePDF2')->name('Acompanhantes.pdf');

Route::get('/alunos/cadastrar', 'AlunoController@cadastrar')->name('aluno.cadastrar');
Route::post('/alunos/cadastrar', 'AlunoController@save_submit')->name('aluno.salvar');
Route::get('/alunos/delete/{id}', 'AlunoController@delete')->name('aluno.delete');
Route::get('/alunos/editar/{id}', 'AlunoController@editar')->name('aluno.editar');
Route::post('/alunos/editar/{id}', 'AlunoController@edit_submit')->name('aluno.editar');
Route::get('/alunos', 'AlunoController@show')->name('Alunos');
Route::get('/alunos/load', 'AlunoController@load')->name('alunos.load');
Route::post('/alunos/load', 'AlunoController@load')->name('alunos.load');
Route::get('/alunos/pdf','AlunoController@generatePDF')->name('alunos.pdf');
Route::get('/alunos/pdf2/{ids}','AlunoController@generatePDF2')->name('alunos.pdf');

Route::get('/voluntarios/cadastrar', 'VoluntariosController@cadastrar')->name('Voluntario.cadastrar');
Route::post('/voluntarios/cadastrar', 'VoluntariosController@save_submit')->name('Voluntario.salvar');
Route::get('/voluntarios/delete/{id}', 'VoluntariosController@delete')->name('Voluntario.delete');
Route::get('/voluntarios/editar/{id}', 'VoluntariosController@editar')->name('Voluntario.editar');
Route::post('/voluntarios/editar/{id}', 'VoluntariosController@edit_submit')->name('Voluntario.editar');
Route::get('/voluntarios', 'VoluntariosController@show')->name('Voluntario');
Route::get('/voluntarios/load', 'VoluntariosController@load')->name('Voluntario.load');
Route::post('/voluntarios/load', 'VoluntariosController@load')->name('Voluntario.load');
Route::get('/voluntarios/pdf', 'VoluntariosController@generatePDF')->name('Voluntario.pdf');
Route::get('/voluntarios2/pdf', 'VoluntariosController@generatePDF2')->name('Voluntario.pdf');

Route::get('/tonners', 'TonnerController@index')->name('tonners');
Route::get('/tonners/cadastrar', 'TonnerController@cadastrar')->name('Tonners.cadastrar');
Route::post('/tonners/cadastrar', 'TonnerController@save_submit')->name('Tonners.salvar');
Route::get('/tonners/delete/{id}', 'TonnerController@delete')->name('Tonners.delete');
Route::get('/tonners/editar/{id}', 'TonnerController@editar')->name('Tonners.editar');
Route::post('/tonners/editar/{id}', 'TonnerController@edit_submit')->name('Tonners.editar');
Route::get('/tonners/load', 'TonnerController@load')->name('Tonners.load');
Route::post('/tonners/load', 'TonnerController@load')->name('Tonners.load');
//Route::get('/tonners/pdf', 'TonnersController@generatePDF')->name('Tonners.pdf');
//Route::get('/tonners/pdf2', 'TonnersController@generatePDF2')->name('Tonners.pdf');

Route::get('/ordens/cadastrar', 'OrdemServicoController@cadastrar')->name('Ordem.cadastrar');
Route::post('/ordens/cadastrar', 'OrdemServicoController@save_submit')->name('Ordem.salvar');
Route::get('/ordens/delete/{id}', 'OrdemServicoController@delete')->name('Ordem.delete');
Route::get('/ordens/editar/{id}', 'OrdemServicoController@editar')->name('Ordem.editar');
Route::post('/ordens/editar/{id}', 'OrdemServicoController@edit_submit')->name('Ordem.editar');
Route::get('/ordens/load', 'OrdemServicoController@load')->name('Ordem.load');
Route::post('/ordens/load', 'OrdemServicoController@load')->name('Ordem.load');
Route::get('/ordens/load/tonners', 'OrdemServicoController@load_tonners')->name('Ordem.load_tonners');
Route::get('/ordens/cadastrar_load', 'OrdemServicoController@cadastrar_load')->name('Ordem.cadastrar_load');
//Route::get('/ordens/pdf', 'OrdensController@generatePDF')->name('Ordem.pdf');
//Route::get('/ordens/pdf2', 'OrdensController@generatePDF2')->name('Ordem.pdf');
