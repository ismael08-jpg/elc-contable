<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CuentasPagar
 * 
 * @property int $id_cuenta_pagar
 * @property float|null $iva
 * @property Carbon $fecha_pago_iva
 * @property Carbon $fecha_vencimiento_iva
 * @property float|null $retencion
 * @property Carbon $fecha_pago_retencion
 * @property Carbon $fecha_vencimiento_retencion
 * 
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class CuentasPagar extends Model
{
	protected $table = 'cuentas_pagar';
	protected $primaryKey = 'id_cuenta_pagar';
	public $timestamps = false;

	protected $casts = [
		'iva' => 'float',
		'retencion' => 'float'
	];

	protected $dates = [
		'fecha_pago_iva',
		'fecha_vencimiento_iva',
		'fecha_pago_retencion',
		'fecha_vencimiento_retencion'
	];

	protected $fillable = [
		'iva',
		'fecha_pago_iva',
		'fecha_vencimiento_iva',
		'retencion',
		'fecha_pago_retencion',
		'fecha_vencimiento_retencion'
	];

	public function compras()
	{
		return $this->hasMany(Compra::class, 'id_cuenta_pagar');
	}
}
