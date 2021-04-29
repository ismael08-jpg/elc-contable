<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id_cliente
 * @property string $nombre_cliente
 * 
 * @property Collection|MaestroCliente[] $maestro_clientes
 * @property Collection|Ventum[] $venta
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';
	protected $primaryKey = 'id_cliente';
	public $timestamps = false;

	protected $fillable = [
		'nombre_cliente'
	];

	public function maestro_clientes()
	{
		return $this->hasMany(MaestroCliente::class, 'id_cliente');
	}

	public function venta()
	{
		return $this->hasMany(Ventum::class, 'id_cliente');
	}
}
