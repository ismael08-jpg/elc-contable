<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleVentum
 * 
 * @property int $id_detalle_venta
 * @property int $id_venta
 * @property string|null $descripcion
 * @property float|null $precio_unitario
 * @property int|null $cantidad
 * @property float|null $presupuesto
 * @property float|null $ventas_no_sujetas
 * @property float|null $ventas_grabadas
 * @property float|null $sub_total
 * 
 * @property Ventum $ventum
 *
 * @package App\Models
 */
class DetalleVentum extends Model
{
	protected $table = 'detalle_venta';
	protected $primaryKey = 'id_detalle_venta';
	public $timestamps = false;

	protected $casts = [
		'id_venta' => 'int',
		'precio_unitario' => 'float',
		'cantidad' => 'int',
		'presupuesto' => 'float',
		'ventas_no_sujetas' => 'float',
		'ventas_grabadas' => 'float',
		'sub_total' => 'float'
	];

	protected $fillable = [
		'id_venta',
		'descripcion',
		'precio_unitario',
		'cantidad',
		'presupuesto',
		'ventas_no_sujetas',
		'ventas_grabadas',
		'sub_total'
	];

	public function ventum()
	{
		return $this->belongsTo(Ventum::class, 'id_venta');
	}
}
