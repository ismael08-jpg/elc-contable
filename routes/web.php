<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\MaestroClienteController;
use App\Http\Controllers\MaestroProveedorController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CuentasPagarController;
use App\Http\Controllers\DetalleCompraController;
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

/*Ajax Maestros*/
Route::get('/estados', [MaestroClienteController::class, 'getEstados']);
Route::get('/municipios', [MaestroClienteController::class, 'getMunicipios']);
Route::get('/pariso-pais', [MaestroClienteController::class, 'getParaiso']);
Route::get('/pariso-estado', [MaestroClienteController::class, 'getParaisoEstado']);
Route::get('/codigo', [PaisController::class, 'getCodigoPais']);
Route::get('/codigoPais', [PaisController::class, 'getCodigo']);


/* Maestro Proveedor Routes*/
Route::get('/maestro-proveedor', [MaestroProveedorController::class, 'index'])->name('maestroProveedor.index');
Route::post('/maestro-proveedor/store', [MaestroProveedorController::class, 'store'])->name('maestroProveedor.store');
Route::put('/maestro-proveedor/update', [MaestroProveedorController::class, 'update'])->name('maestroProveedor.update');
Route::delete('/maestro-proveedor/destroy', [MaestroProveedorController::class, 'destroy'])->name('maestroProveedor.delete');


/* Usuarios Routes*/
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::put('/usuarios/update', [UsuariosController::class, 'update'])->name('usuario.update');
Route::put('/usuarios/update/password', [UsuariosController::class, 'update'])->name('usuario.updatePassword');

/* Venta y cuentas de venta Routes*/
Route::get('/venta', [VentaController::class, 'index'])->name('venta.index');
Route::post('/venta/create', [VentaController::class, 'store'])->name('venta.store');
Route::put('/venta/update', [VentaController::class, 'update'])->name('venta.update');
Route::delete('/venta/destroy', [VentaController::class, 'destroy'])->name('venta.delete');
Route::put('/venta/pay', [VentaController::class, 'pay'])->name('venta.pay');
Route::put('/venta/edit/pay', [VentaController::class, 'editPay'])->name('venta.edit.pay');
//-- Detalles de venta --//
Route::get('/venta/detalle-venta/{id}', [DetalleVentaController::class, 'index'])->name('detalleVenta.index');
Route::post('/venta/detalle-venta/create', [DetalleVentaController::class, 'store'])->name('detalleVenta.create');
Route::put('/compra/detalle-venta/update', [DetalleVentaController::class, 'update'])->name('detalleVenta.update');
Route::delete('/compra/detalle-venta/destroy', [DetalleVentaController::class, 'destroy'])->name('detalleVenta.delete');


/* compra y cuentas de compra Routes*/
Route::get('/compra/{id}', [CompraController::class, 'index'])->name('compra.index');
Route::post('/compra/create', [CompraController::class, 'store'])->name('compra.create');
Route::put('/compra/update', [CompraController::class, 'update'])->name('compra.update');
Route::delete('/compra/destroy', [CompraController::class, 'destroy'])->name('compra.delete');
//-- Detalles de compra --//
Route::get('/compra/detalle-compra/{id}', [DetalleCompraController::class, 'index'])->name('detalleCompra.index');
Route::post('/compra/detalle-compra/create', [DetalleCompraController::class, 'store'])->name('detalleCompra.create');
Route::put('/compra/detalle-compra/update', [DetalleCompraController::class, 'update'])->name('detalleCompra.update');
Route::delete('/compra/detalle-compra/destroy', [DetalleCompraController::class, 'destroy'])->name('detalleCompra.delete');

/*/-- PAIS --/*/
Route::get('pais/paraiso-fiscal', [PaisController::class, 'index'])->name('pais.index');
Route::put('pais/paraiso-fiscal', [PaisController::class, 'update'])->name('pais.update');

/*/-- Estado --/*/
Route::get('estado/paraiso-fiscal', [EstadoController::class, 'index'])->name('estado.index');
Route::put('estado/paraiso-fiscal', [EstadoController::class, 'update'])->name('estado.update');

/*--   Cuentas X Cobrar  --*/
Route::get('/cuentas-x-pagar', [CuentasPagarController::class, 'index'])->name('cuentas-pagar.index');


Route::get('/admin/index', [AdministradorController::class, 'index'])->name('administrador.index');



Auth::routes(['register' => false]);