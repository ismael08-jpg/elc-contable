<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\MaestroClienteController;
use App\Http\Controllers\MaestroProveedorController;
use App\Models\CotCatalogoCredito;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\ShowUsers;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Maestro Cliente Routes*/
Route::get('/maestro-cliente', [MaestroClienteController::class, 'index'])->name('maestroCliente.index');
Route::post('/maestro-cliente/store', [MaestroClienteController::class, 'store'])->name('maestroCliente.store');
Route::put('/maestro-cliente/update', [MaestroClienteController::class, 'update'])->name('maestroCliente.update');
Route::delete('/maestro-cliente/destroy', [MaestroClienteController::class, 'destroy'])->name('maestroCliente.delete');

/* Maestro Proveedor Routes*/
Route::get('/maestro-proveedor', [MaestroProveedorController::class, 'index'])->name('maestroProveedor.index');
Route::post('/maestro-proveedor/store', [MaestroProveedorController::class, 'store'])->name('maestroProveedor.store');
Route::put('/maestro-proveedor/update', [MaestroProveedorController::class, 'update'])->name('maestroProveedor.update');
Route::delete('/maestro-proveedor/destroy', [MaestroProveedorController::class, 'destroy'])->name('maestroProveedor.delete');


Route::get('/admin/index', [AdministradorController::class, 'index'])->name('administrador.index');


Route::get('/usuarios', ShowUsers::class)->name('usuarios');
Auth::routes(['register' => false]);