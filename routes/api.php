<?php
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

Route::post('/authenicate', [AuthenticationController::class, 'sendOtp'])->name('authenicate');
Route::get('/test', [AuthenticationController::class, 'test'])->name('test');
Route::group(['middleware' => 'auth:sanctum'], function () {


});
