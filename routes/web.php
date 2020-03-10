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

Route::get('/', 'SubscriptionController@index')->middleware('auth');
Route::get('/solicitacao-elegibilidade', 'SubscriptionController@new')->middleware('auth');
Route::get('/visualizar-candidatura/{subscription}', 'SubscriptionController@show')->middleware('auth');

Route::post('/change-password', 'Auth\ForgotPasswordController@changePassword');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
