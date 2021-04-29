<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $id_compra
 * @property int $id_proveedor
 * @property int $id_venta
 * @property int $id_cuenta_pagar
 * @property int|null $id_cuenta_cobrar
 * @property string $credito_fiscal
 * @property float|null $monto_com
 * @property string $concepto_com
 * @property Carbon $fecha_emision
 * @property Carbon $fecha_vencimiento
 * 
 * @property CuentasCobrar|null $cuentas_cobrar
 * @property CuentasPagar $cuentas_pagar
 * @property Proveedor $proveedor
 * @property Ventum $ventum
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compra';
	protected $primaryKey = 'id_compra';
	public $timestamps = false;

	protected $casts = [
		'id_proveedor' => 'int',
		'id_venta' => 'int',
		'id_cuenta_pagar' => 'int',
		'id_cuenta_cobrar' => 'int',
		'monto_com' => 'float'
	];

	protected $dates = [
		'fecha_emision',
		'fecha_vencimiento'
	];

	protected $fillable = [
		'id_proveedor',
		'id_venta',
		'id_cuenta_pagar',
		'id_cuenta_cobrar',
		'credito_fiscal',
		'monto_com',
		'concepto_com',
		'fecha_emision',
		'fecha_vencimiento'
	];

	public function cuentas_cobrar()
	{
		return $this->belongsTo(CuentasCobrar::class, 'id_cuenta_cobrar');
	}

	public function cuentas_pagar()
	{
		return $this->belongsTo(CuentasPagar::class, 'id_cuenta_pagar');
	}

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'id_proveedor');
	}

	public function ventum()
	{
		return $this->belongsTo(Ventum::class, 'id_venta');
	}
}
