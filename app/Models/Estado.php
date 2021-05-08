<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * 
 * @property int $id
 * @property int|null $id_pais
 * @property string $nombre_estado
 * 
 * @property Pai|null $pai
 *
 * @package App\Models
 */
class Estado extends Model
{
	protected $table = 'estado';
	public $timestamps = false;

	protected $casts = [
		'id_pais' => 'int'
	];

	protected $fillable = [
		'id_pais',
		'nombre_estado'
	];

	public function pai()
	{
		return $this->belongsTo(Pai::class, 'id_pais');
	}
}
