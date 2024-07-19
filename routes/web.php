<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/inicio', function () {
 
    $user = Auth::user()->id;
    //obtengo el id del usuario
    $tasks = Task::where('user_id', $user)->paginate(10);


    return view('inicio',  compact('tasks'));
})->middleware('auth')->name('inicio');


//Route::get('/', function () {
  //  return view('auth.login');
//})->middleware('auth')->name('inicio');


//Rutas con resource para task
Route::resource('tasks', TaskController::class);
