<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\MaestroClienteController;
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

Route::get('/maestro-cliente', [MaestroClienteController::class, 'index'])->name('maestroCliente.index');
Route::post('/maestro-cliente/store', [MaestroClienteController::class, 'store'])->name('maestroCliente.store');
Route::put('/maestro-cliente/update', [MaestroClienteController::class, 'update'])->name('maestroCliente.update');
Route::delete('/maestro-cliente/destroy', [MaestroClienteController::class, 'destroy'])->name('maestroCliente.delete');
Route::get('/admin/index', [AdministradorController::class, 'index'])->name('administrador.index');


Route::get('/usuarios', ShowUsers::class)->name('usuarios');
Auth::routes(['register' => false]);