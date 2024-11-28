<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;
require __DIR__.'/auth.php';
Route::get('/', [FolderController::class, 'home'])->name('home');

Route::post('/create', [FolderController::class, 'createFolder'])->name('create.folder')->middleware(['auth']);
Route::get('/view-folders', [FolderController::class, 'viewFolders'])->name('condivisi')->middleware(['auth']);
Route::get('/view/{id}/show', [FolderController::class, 'mostra_cartella'])->name('mostra_cartella')->middleware(['auth']);
Route::get('/delete/{id}', [FolderController::class, 'cancella_cartella'])->name('cancella_cartella')->middleware(['auth']);
Route::get('/delete/{id}/ph', [FolderController::class, 'elimina_immagine'])->name('elimina_immagine')->middleware(['auth']);
Route::post('/insert/file', [FolderController::class, 'inserisci_file'])->name('inserisci_file')->middleware(['auth']);
Route::post('/insert', [FolderController::class, 'inserisci_singolo_file'])->name('inserisci_singolo_file')->middleware(['auth']);
Route::post('/update-folder-name', [FolderController::class, 'updateFolderName'])->name('update.folder.name')->middleware(['auth']);
Route::get('/search', [FolderController::class, 'search'])->name('file.search')->middleware(['auth']);

//IMPORTANTE, non ho messo la visualizzazione a elenco quando cerchi qualcosa
