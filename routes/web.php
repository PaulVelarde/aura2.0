<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\RedVideoController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TransmisionEnVivoController;

// Página de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas de noticias
Route::prefix('noticias')->name('noticias.')->group(function () {
    Route::get('/', [NoticiaController::class, 'index'])->name('index');
    Route::get('/create', [NoticiaController::class, 'create'])->name('create');
    Route::post('/', [NoticiaController::class, 'store'])->name('store');
    Route::get('/{id}', [NoticiaController::class, 'show'])->name('show');
    Route::get('/{noticia}/edit', [NoticiaController::class, 'edit'])->name('edit');
    Route::put('/{noticia}', [NoticiaController::class, 'update'])->name('update');
    Route::delete('/{noticia}', [NoticiaController::class, 'destroy'])->name('destroy');
});

// Rutas del panel de administración
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminPanelController::class, 'index'])->name('index');
    Route::post('/noticias', [AdminPanelController::class, 'storeNews'])->name('store.news');
    Route::post('/videos', [AdminPanelController::class, 'storeVideo'])->name('store.video');
});

// Rutas de multimedia
Route::prefix('multimedia')->name('multimedia.')->group(function (): void {
    Route::get('/videos', [RedVideoController::class, 'videos'])->name('videos');
    Route::resource('red_videos', RedVideoController::class);
});

// Rutas de transmisiones en vivo
Route::prefix('transmision')->name('transmision.')->group(function () {
    Route::get('/', [TransmisionEnVivoController::class, 'show'])->name('show');
    Route::post('/activar', [TransmisionEnVivoController::class, 'activate'])->name('activate');
    Route::post('/finalizar', [TransmisionEnVivoController::class, 'deactivate'])->name('deactivate');
});


// Página de aterrizaje
Route::view('/landing', 'landing')->name('landing');

// Rutas de autenticación
Route::prefix('auth')->group(function () {
    Route::get('/login', fn() => view('login'))->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// team
Route::get('/team', [TeamMemberController::class, 'index'])->name('team.index');
