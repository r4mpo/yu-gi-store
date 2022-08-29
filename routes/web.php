<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ygoprodec\CardsController;

Route::get('/', [CardsController::class, 'Index']);
Route::get('/cards/pesquisar', [CardsController::class, 'searchCards']);
Route::get('/SearchCardsInApi/{id}', [CardsController::class, 'SearchCardsInApi']);
Route::get('/Cards/Show/{id}', [CardsController::class, 'Show']);
Route::get('/SearchCardsInApiByName/{id}', [CardsController::class, 'searchCardsName']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});