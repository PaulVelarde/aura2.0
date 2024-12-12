<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AdminPanelController;

// Rutas para noticias
// Route::prefix('news')->name('news.')->group(function () {
//     Route::get('/', [NoticiaController::class, 'index'])->name('index'); // Listar noticias
//     Route::get('/{id}', [NoticiaController::class, 'show'])->name('show'); // Mostrar noticia específica
// });


Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');
Route::get('/noticias/{noticia}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
Route::delete('/noticias/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');// Ruta para el panel de administración


Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');

// Rutas para la página de inicio
//Route::get('/', [HomeController::class, 'loadAndRedirect'])->name('loading');
Route::get('/', [HomeController::class, 'index'])->name('home');
