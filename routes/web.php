<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;

Route::get('/', [FolderController::class, 'home'])->name('home');

Route::post('/create', [FolderController::class, 'createFolder'])->name('create.folder');
Route::get('/view-folders', [FolderController::class, 'viewFolders'])->name('condivisi');
Route::get('/view/{id}/show', [FolderController::class, 'mostra_cartella'])->name('mostra_cartella');
Route::get('/delete/{id}', [FolderController::class, 'cancella_cartella'])->name('cancella_cartella');
Route::get('/delete/{id}/ph', [FolderController::class, 'elimina_immagine'])->name('elimina_immagine');
Route::post('/insert/file', [FolderController::class, 'inserisci_file'])->name('inserisci_file');
Route::post('/insert', [FolderController::class, 'inserisci_singolo_file'])->name('inserisci_singolo_file');
Route::post('/update-folder-name', [FolderController::class, 'updateFolderName'])->name('update.folder.name');
Route::get('/search', [FolderController::class, 'search'])->name('file.search');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//IMPORTANTE, non funziona il tasto cerca
//dashboard utente e sistema il tasto condivi, in quanto si vede uguale al mio drive 1^ sezione