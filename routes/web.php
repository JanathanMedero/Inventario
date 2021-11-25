<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
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
    Route::get('empleado/{slug}/editar', [EmployeController::class, 'edit'])->name('employe.edit');
    Route::post('add/empleado', [EmployeController::class, 'store'])->name('employe.store');
    Route::delete('empleado/{slug}/delete', [EmployeController::class, 'delete'])->name('employe.destroy');
    Route::put('empleado/{slug}/update', [EmployeController::class, 'update'])->name('employe.update');

    //Inventario
    Route::get('inventario', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('inventario/nuevo-producto', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('inventario/nuevo-producto', [InventoryController::class, 'store'])->name('inventory.store');
    Route::post('import-list-products', [InventoryController::class, 'importProducts'])->name('excel.import');

    //Productos
    Route::get('producto/{slug}/editar', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('producto/{slug}/eliminar', [ProductController::class, 'destroy'])->name('product.destroy');

    //Excel
    Route::get('generar-reporte/excel', [ReportController::class, 'excel'])->name('report.excel');


});
