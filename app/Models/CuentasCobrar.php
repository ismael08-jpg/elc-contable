<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CuentasCobrar
 * 
 * @property int $id_cuenta_cobrar
 * @property float|null $monto_cobrar
 * @property Carbon $fecha_pago_monto
 * @property Carbon $fecha_vencimiento_monto
 * 
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class CuentasCobrar extends Model
{
	protected $table = 'cuentas_cobrar';
	protected $primaryKey = 'id_cuenta_cobrar';
	public $timestamps = false;

	protected $casts = [
		'monto_cobrar' => 'float'
	];

	protected $dates = [
		'fecha_pago_monto',
		'fecha_vencimiento_monto'
	];

	protected $fillable = [
		'monto_cobrar',
		'fecha_pago_monto',
		'fecha_vencimiento_monto'
	];

	public function compras()
	{
		return $this->hasMany(Compra::class, 'id_cuenta_cobrar');
	}
}
