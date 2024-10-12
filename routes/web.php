<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdineController;
use App\Models\Ordine;

Route::get('/', function () {
     $data = Ordine::all();
    return view('index',compact('data'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/agg', [OrdineController::class, 'insert'])->name('insert');
Route::post('/view/{id}', [OrdineController::class, 'mostra_cartella'])->name('mostra_cartella');


require __DIR__.'/auth.php';
