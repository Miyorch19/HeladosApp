<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TipoProductoController;
use App\Http\Controllers\Admin\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta principal de la heladería
Route::get('/', function () {
    return view('heladeria.home');
})->name('home');

// Rutas de la heladería (sin autenticación requerida)
Route::prefix('heladeria')->name('heladeria.')->group(function () {
    Route::get('/sabores', function () {
        return view('heladeria.sabores');
    })->name('sabores');
    
    Route::get('/promociones', function () {
        return view('heladeria.promociones');
    })->name('promociones');
    
    Route::get('/contacto', function () {
        return view('heladeria.contacto');
    })->name('contacto');
});




// Rutas de administrador (requieren autenticación y rol admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('home');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    
    // Vista principal de gestión de productos (categorías)
    Route::get('/gestion-productos', [TipoProductoController::class, 'index'])->name('productos.productos');
    
    // Rutas específicas para categorías (sin resource)
    Route::post('/categorias/store', [TipoProductoController::class, 'store'])->name('categorias.store');
    Route::put('/categorias/{tipoProducto}', [TipoProductoController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{tipoProducto}', [TipoProductoController::class, 'destroy'])->name('categorias.destroy');
    
    // Agregar estas rutas dentro del grupo de rutas de admin en web.php

// Rutas para gestión de usuarios (dentro del grupo admin)
Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
    //Vistas específicas para cada categoría de productos
    Route::get('/productos/helados', [ProductoController::class, 'helados'])->name('productos.helados');
    Route::get('/productos/malteadas', [ProductoController::class, 'malteadas'])->name('productos.malteadas');
    Route::get('/productos/paletas', [ProductoController::class, 'paletas'])->name('productos.paletas');
    
    // Rutas resource para productos individuales (con soporte AJAX)
    Route::resource('productos', ProductoController::class);
});

// Rutas de perfil (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Incluir rutas de autenticación (login, logout, etc.)
require __DIR__.'/auth.php';