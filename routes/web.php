<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin',[AdminController::class,'tampiladmin'])->name('dashboardadmin');
Route::get('/login',[AdminController::class,'login']) -> name('loginadmin');
Route::post('/proseslogin', [AdminController::class, 'proseslogin'])->name('loginproses');
Route::get('/formregister',[AdminController::class,'fregister'])->name('formregister');
Route::post('/prosesregister',[AdminController::class,'daftar'])->name('prosesregister');
Route::get('/editadmin/{id}', [AdminController::class, 'editAdmin'])->name('adminedit');
Route::post('/updateadmin/{id}', [AdminController::class, 'updateAdmin'])->name('adminupdate');
Route::delete('/deleteadmin/{id}', [AdminController::class, 'deleteAdmin'])->name('admindelete');
Route::get('/logout',[AdminController::class,'logout']) -> name('logout');
