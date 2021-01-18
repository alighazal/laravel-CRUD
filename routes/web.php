<?php

use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

    //dd(auth()->user());
    return view('welcome');
})->name('home');


Route::get('/register', [  RegisterController::class, 'index' ] )->name('register');
Route::post('/register', [  RegisterController::class, 'store' ] )->name('register');

Route::get('/login', [  LoginController::class, 'index' ] )->name('login');
Route::post('/login', [  LoginController::class, 'store' ] )->name('login');

Route::post('/logout', [  LogoutController::class, 'store' ] )->name('logout');

Route::get('/create', [TicketController::class, 'create' ])->name('create');
Route::post('/create', [TicketController::class, 'store' ]) ->name('create');

Route::get('/tickets', [TicketController::class, 'index' ])->name('tickets.index');


Route::get('/edit/ticket/{id}',[TicketController::class, 'edit' ])->name('edit');
Route::patch('/edit/ticket/{id}',[TicketController::class, 'update' ])->name('update');

Route::delete('/delete/ticket/{id}',[TicketController::class, 'destroy' ])->name('destroy');



