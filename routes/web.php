<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Auth::routes([
    'reset'     => false,
    'verify'    => false,
    'register'  => false
]);

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Empleados
    Route::get('empleados', [EmployeController::class, 'index'])->name('employe.index');

    //Inventario
    Route::get('inventario', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('inventario/nuevo-producto', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('inventario/nuevo-producto', [InventoryController::class, 'store'])->name('inventory.store');
    Route::post('import-list-products', [InventoryController::class, 'importProducts'])->name('excel.import');

    //Productos
    Route::get('producto/{slug}/editar', [ProductController::class, 'edit'])->name('product.edit');


});
