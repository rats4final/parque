<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\rolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\clienteController;


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

/*
Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function(){
    return view('main');
});

Route::get('/home', function(){
    //dd(Auth::user());
    return view('home');
})->middleware(['auth','verified']);

Route::resource('cliente', clienteController::class);
Route::resource('servicio', ServiciosController::class);
Route::resource('rol', rolController::class);
Route::resource('user', UserController::class)->middleware(['auth','verified']);
Route::resource('categoria', categoriaController::class);
Route::resource('factura', FacturasController::class);

// User::factory()->create(['email'=>'admin@gmail.com']);
// Route::view('login_old', 'login_old');
// Route::post('login_old', function(){

//     $credenciales=request()->only('email','password');

//     if (Auth::attempt($credenciales)) {
//         request()->session()->regenerate();
//         return redirect('/');
//     }

//     return redirect('login_old');
// });


