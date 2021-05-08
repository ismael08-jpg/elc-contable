<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pai
 * 
 * @property int $id
 * @property string $nombre_pais
 * 
 * @property Collection|Estado[] $estados
 *
 * @package App\Models
 */
class Pais extends Model
{
	protected $table = 'pais';
	public $timestamps = false;

	protected $fillable = [
		'nombre_pais'
	];

	public function estados()
	{
		return $this->hasMany(Estado::class, 'id_pais');
	}
}
