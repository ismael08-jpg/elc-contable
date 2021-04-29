<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventum
 * 
 * @property int $id_venta
 * @property int $id_cliente
 * @property int $id_cuenta_cobrar
 * @property string $credito_fiscal
 * @property float|null $monto_ven
 * @property Carbon $fecha_pago_venta
 * @property string $concepto_ven
 * @property Carbon $fecha_emision
 * @property Carbon $fecha_vencimiento
 * 
 * @property Cliente $cliente
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class Ventum extends Model
{
	protected $table = 'venta';
	protected $primaryKey = 'id_venta';
	public $timestamps = false;

	protected $casts = [
		'id_cliente' => 'int',
		'id_cuenta_cobrar' => 'int',
		'monto_ven' => 'float'
	];

	protected $dates = [
		'fecha_pago_venta',
		'fecha_emision',
		'fecha_vencimiento'
	];

	protected $fillable = [
		'id_cliente',
		'id_cuenta_cobrar',
		'credito_fiscal',
		'monto_ven',
		'fecha_pago_venta',
		'concepto_ven',
		'fecha_emision',
		'fecha_vencimiento'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_cliente');
	}

	public function compras()
	{
		return $this->hasMany(Compra::class, 'id_venta');
	}
}
