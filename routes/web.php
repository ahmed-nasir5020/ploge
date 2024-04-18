<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
----start project ----------
1- define route
2- define controller
3- define view
4- remove static data and come from contoller
*/

// display index method or action
Route::get('/',function (){ return "wellcome in my blog ";});
// display index method or action
Route::get('/postes',[PostsController::class,'index'])->name('postes.index');
// creat
Route::get('/postes/create',[PostsController::class,'create'])->name('postes.create');
// edite
Route::get('postes/{poste}/edite',[PostsController::class,'edite'])->name('postes.edite');
// store
Route::post('/postes',[PostsController::class,'store'])->name('postes.store');
// show url prameter show method or action
Route::get('/postes/{post}',[PostsController::class,'show'])->name('postes.show');
// update
Route::put('/postes/{poste}',[PostsController::class,'update'])->name('postes.update');
// delete
Route::delete('postes/{poste}',[PostsController::class,'destroy'])->name('postes.destroy');
