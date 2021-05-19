<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleCompra
 * 
 * @property int $id_detalle_compra
 * @property int $id_compra
 * @property string|null $descripcion
 * @property float|null $precio_unitario
 * @property int|null $cantidad
 * @property float|null $presupuesto
 * 
 * @property Compra $compra
 *
 * @package App\Models
 */
class DetalleCompra extends Model
{
	protected $table = 'detalle_compra';
	protected $primaryKey = 'id_detalle_compra';
	public $timestamps = false;

	protected $casts = [
		'id_compra' => 'int',
		'precio_unitario' => 'float',
		'cantidad' => 'int',
		'presupuesto' => 'float'
	];

	protected $fillable = [
		'id_compra',
		'descripcion',
		'precio_unitario',
		'cantidad',
		'presupuesto'
	];

	public function compra()
	{
		return $this->belongsTo(Compra::class, 'id_compra');
	}
}
