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


Route::get('/', function (){
    return view('Login');
})->name('logueo');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
// /home : podria ponerse cualquie nombre, manda el controlador
// el ->name('home') indica donde esta la vista

//Codigo Propio

Route::post('/index',array(
    'as' =>'elvin',   
    'uses' => 'usuarioController@LoginUser'
));

//Route::post('/carga','excelController@ImportarExcel');
Route::post('/carga',array(
    'as' => 'CargaMasiva',
    'uses' => 'excelController@ImportarExcel'
));
Route::get('/carga',function()
{
    return view('CargaMasiva');
})->name('bandeja');

Route::get('/default',function(){
    return view('default');
})->name('defaultx');

Route::get('/lista',array(
    'as' => 'listausuarios',
    'uses' => 'usuarioController@ListarUsuarios'
));

Route::post('/addUser',array(
    'as' => 'addUser',
    'uses' => 'usuarioController@AgregarUsuarios'
));

Route::post('/addCliente',array(
    'as' => 'addCliente',
    'uses' => 'clienteController@agregarCliente'
));

Route::post('/estado',array(
    'as' => 'changeState',
    'uses' => 'usuarioController@EstadoUsuario'
));

Route::get('/config',function(){
    return view('Usuarios.userconfig');
})->name('configUser');

Route::post('/changePassword',array(
    'as' => 'changePassword',
    'uses' => 'usuarioController@configUser'
));

Route::get('/tareas',array(
    'as' => 'ListaTareas',
    'uses' => 'tareaController@listar'
));

Route::post('/busquedaNodo',array(
    'as' => 'busquedaNodo',
    'uses' => 'tareaController@listarNodo'
));

// Route::get('/listadoc/{tipodoc}',array(
//     'as' => 'listadoc',
//     'uses' => 'documentoController@listarDocumentosxTarea'
// )
// );

Route::post('/listadoc',array(
    'as' => 'listadoc',
    'uses' => 'documentoController@listarDocumentosxTarea'
));

Route::post('/mostrardocumento', array(
    'as' => 'mostrardocumento',
    'uses' => 'documentoController@mostrarDocumentos'
));

Route::post('/guardarexcel',array(
    'as' => 'guardarexcel',
    'uses' => 'excelController@guardarExcel'
));
//Seccion Documentos
