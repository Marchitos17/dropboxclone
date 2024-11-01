<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;
require __DIR__.'/auth.php';
Route::get('/', [FolderController::class, 'home'])->name('home');

Route::post('/create', [FolderController::class, 'createFolder'])->name('create.folder');
Route::get('/view-folders', [FolderController::class, 'viewFolders'])->name('condivisi');
Route::get('/view/{id}/show', [FolderController::class, 'mostra_cartella'])->name('mostra_cartella');
Route::get('/delete/{id}', [FolderController::class, 'cancella_cartella'])->name('cancella_cartella');
Route::get('/delete/{id}/ph', [FolderController::class, 'elimina_immagine'])->name('elimina_immagine');
Route::post('/insert/{id}/file', [FolderController::class, 'inserisci_file'])->name('inserisci_file');

//crea 4 cartelle con 4 foto