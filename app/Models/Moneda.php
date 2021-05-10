<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Moneda
 * 
 * @property string|null $codigo
 * @property string|null $lenguaje
 * @property string|null $nombre_moneda
 * @property string|null $moneda
 * @property string|null $simbolo
 *
 * @package App\Models
 */
class Moneda extends Model
{
	protected $table = 'moneda';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'codigo',
		'lenguaje',
		'nombre_moneda',
		'moneda',
		'simbolo'
	];
}
