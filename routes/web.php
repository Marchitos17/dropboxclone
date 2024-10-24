<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdineController;
use App\Models\Ordine;
use App\Models\Image;
use App\Http\Controllers\ImmagineController;

Route::get('/', function () {
     $ordine = Ordine::all();
    return view('index',compact('ordine'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::post('/agg', [OrdineController::class, 'insert'])->name('insert');
Route::get('/view/{numero_ordine}', [OrdineController::class, 'mostra_cartella'])->name('mostra_cartella');
Route::get('/sv/{id}', [OrdineController::class, 'svuota_cartella'])->name('svuota_cartella');
Route::get('/ci', [OrdineController::class, 'cancella_img'])->name('cancella_img');

require __DIR__.'/auth.php';

//https://www.youtube.com/watch?v=9D7BxfgeDo8&t=1701s

Route::post('/agg', [ImmagineController::class, 'store'])->name('store');