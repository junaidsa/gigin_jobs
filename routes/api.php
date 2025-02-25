<?php
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Route;

Route::post('/authenicate', [AuthenticationController::class, 'register'])->name('register');
Route::group(['middleware' => 'auth:sanctum'], function () {


});
