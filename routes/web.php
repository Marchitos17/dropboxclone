<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;

//Route::get('/', function () {
//     $ordine = Ordine::all();
//    return view('index',compact('ordine'));
//});
require __DIR__.'/auth.php';

//https://www.youtube.com/watch?v=9D7BxfgeDo8&t=1701s

//Route::get('/lista_ordini',[OrdineController::class, 'show'])->name('show');
//Route::post('/agg', [ImmagineController::class, 'store'])->name('store');


Route::get('/', [FolderController::class, 'showCreateFolderForm'])->name('create.folder.form');
Route::post('/', [FolderController::class, 'createFolder'])->name('create.folder');
Route::get('/view-folders', [FolderController::class, 'viewFolders'])->name('view.folders');
