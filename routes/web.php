<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

// Rutas para noticias
// Route::prefix('news')->name('news.')->group(function () {
//     Route::get('/', [NoticiaController::class, 'index'])->name('index'); // Listar noticias
//     Route::get('/{id}', [NoticiaController::class, 'show'])->name('show'); // Mostrar noticia específica
// });

<<<<<<< HEAD

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');
Route::get('/noticias/{noticia}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
Route::delete('/noticias/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');// Ruta para el panel de administración


Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');
=======
// Ruta para el panel de administración
//Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');
>>>>>>> b94b15192873100b91736d1a3122643f74962203

// Rutas para la página de inicio
//Route::get('/', [HomeController::class, 'loadAndRedirect'])->name('loading');
Route::get('/', [HomeController::class, 'index'])->name('home');



//admin
Route::get('/admin', [AdminPanelController::class, 'index'])->name('admin.index');
// routes/web.php
Route::post('/admin/noticias', [AdminPanelController::class, 'storeNews'])->name('aura.store.news');
Route::post('/admin/videos', [AdminPanelController::class, 'storeVideo'])->name('aura.store.video');



//login 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
Route::get('/registro', [AuthController::class, 'showRegistrationForm'])->name('registro');

//pagina de aterrizaje 
Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::post('/register', [UserController::class, 'store'])->name('register');