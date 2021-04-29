<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $id_proveedor
 * @property string $nombre_proveedor
 * 
 * @property Collection|Compra[] $compras
 * @property Collection|MaestroProveedor[] $maestro_proveedors
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	protected $table = 'proveedor';
	protected $primaryKey = 'id_proveedor';
	public $timestamps = false;

	protected $fillable = [
		'nombre_proveedor'
	];

	public function compras()
	{
		return $this->hasMany(Compra::class, 'id_proveedor');
	}

	public function maestro_proveedors()
	{
		return $this->hasMany(MaestroProveedor::class, 'id_proveedor');
	}
}
