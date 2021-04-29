<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $nombre
 * @property string $usuario
 * @property int $tipo_usuario
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TiposUsuario $tipos_usuario
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';

	protected $casts = [
		'tipo_usuario' => 'int'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'nombre',
		'usuario',
		'tipo_usuario',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function tipos_usuario()
	{
		return $this->belongsTo(TiposUsuario::class, 'tipo_usuario');
	}
}
