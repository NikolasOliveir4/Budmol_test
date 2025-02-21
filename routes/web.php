<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rota inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
require __DIR__.'/auth.php';

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas de eventos para participantes
    Route::get('/events', [EventController::class, 'index'])->name('events.index'); // Listar eventos
    Route::post('/events/{event}/inscribe', [EventController::class, 'inscribe'])->name('events.inscribe');
Route::delete('/events/{event}/cancel', [EventController::class, 'cancelInscription'])->name('events.cancelInscription');

    // Rotas de eventos para administradores
    Route::middleware('admin')->group(function () {
        Route::resource('events', EventController::class)->except(['index']); // CRUD de eventos (exceto index)
        Route::get('/events/{event}/participants', [EventController::class, 'showParticipants'])->name('events.participants');
    });
});

// Rota de teste para administradores
Route::get('/test-admin', function () {
    return 'Acesso permitido apenas para admins!';
})->middleware('admin');
