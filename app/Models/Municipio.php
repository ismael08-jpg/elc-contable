<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 * 
 * @property int $id
 * @property int $id_estado
 * @property string|null $nombre_municipio
 * 
 * @property Estado $estado
 *
 * @package App\Models
 */
class Municipio extends Model
{
	protected $table = 'municipio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'id_estado' => 'int'
	];

	protected $fillable = [
		'id_estado',
		'nombre_municipio'
	];

	public function estado()
	{
		return $this->belongsTo(Estado::class, 'id_estado');
	}
}
