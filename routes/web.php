<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use location
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');}); 


Route::get('/user', [userController::class, 'index'])->name('user');
Route::get('/userbis2', [userController::class, 'index2'])->name('userbis2');
Route::get('/userbis3', [userController::class, 'index3'])->name('userbis3');
Route::get('/userBK', [userBKController::class, 'index'])->name('userBK');
Route::get('/userBK2', [userBKController::class, 'index2'])->name('userBK2');


Route::get('/beranda', [BerandaController::class, 'index1'])->name('user view.landingpage');
Route::post('/beranda', [BerandaController::class, 'store'])->name('user view.landingpage.store');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
