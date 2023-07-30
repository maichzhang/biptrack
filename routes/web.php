<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
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
    return view('home');}); 


Route::get('/user', [userController::class, 'index'])->name('user');
Route::get('/userBK', [userBKController::class, 'index'])->name('userBK');
Route::get('/home', [homeController::class, 'index'])->name('home');
