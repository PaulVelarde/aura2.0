<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Rutas para noticias
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');
Route::get('/noticias/{noticia}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
Route::delete('/noticias/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');

// Rutas para el panel de administración
Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');
Route::post('/admin/noticias', [AdminPanelController::class, 'storeNews'])->name('aura.store.news');
Route::post('/admin/videos', [AdminPanelController::class, 'storeVideo'])->name('aura.store.video');

// Rutas para la página de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');



// Página de aterrizaje
Route::get('/landing', function () {
    return view('landing');
})->name('landing');



//login
Route::get('/login', function () { return view('login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
