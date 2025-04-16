<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PembimbingController;
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

Route::get('/formregisterpembimbing',[PembimbingController::class,'fregisterpembimbing'])->name('formregisterpembimbing');

Route::post('/prosesregispembimbing',[PembimbingController::class,'daftarpem'])->name('prosesregispembimbing');

Route::get('/editpembimbing/{id}', [PembimbingController::class, 'editPembimbing'])->name('pembimbingedit');

Route::post('/updatepembimbing/{id}', [PembimbingController::class, 'updatePembimbing'])->name('pembimbingupdate');

Route::delete('/deletepembimbing/{id}', [PembimbingController::class, 'deletePembimbing'])->name('pembimbingdelete');

Route::get('/logout',[AdminController::class,'logout']) -> name('logout');
