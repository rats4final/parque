<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\rolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\categoriaController;





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

Route::resource('servicio', ServiciosController::class);
Route::resource('rol', rolController::class);
Route::resource('user', UserController::class);
Route::resource('categoria', categoriaController::class);


//User::factory()->create(['email'=>'admin@gmail.com'])
Route::view('login', 'login');
Route::post('login', function(){

    $credenciales=request()->only('email','password');

    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();
        return redirect('/');
    }

    return redirect('login');
});


