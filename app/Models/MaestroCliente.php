<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MaestroCliente
 * 
 * @property int $id_maestro_cliente
 * @property int $id_cliente
 * @property string|null $numero_cliente_icg
 * @property string $numero_cliente
 * @property string $nombre_comercial
 * @property string $nombre_del_sujeto
 * @property string|null $direccion
 * @property string|null $pais
 * @property string|null $codigo_pais
 * @property string|null $ciudad
 * @property string|null $departamento
 * @property string|null $municipio
 * @property string|null $telefono_fijo
 * @property string|null $pagina_web
 * @property string|null $correo
 * @property string|null $telefono_celular
 * @property string|null $paraiso_fiscal
 * @property string|null $nombre_contacto
 * @property string|null $telefono_contacto
 * @property string|null $cargo_contacto
 * @property string|null $pagina_web_contacto
 * @property string|null $correo_contacto
 * @property string|null $moneda_principal
 * @property string|null $tipo_cambio
 * @property string|null $giro_fical_negocio
 * @property string|null $tipo_contribuyente
 * @property string|null $nit_niff
 * @property string|null $n_registro_fiscal
 * @property string|null $cobra_iva
 * @property string|null $entera_iva
 * @property string|null $retencion_renta
 * @property float|null $porc_retencion
 * @property string|null $percepcion
 * @property string|null $cta_pasivo_uno
 * @property string|null $cta_pasivo_dos
 * @property string|null $cta_activo_uno
 * @property string|null $cta_activo_dos
 * @property float|null $comision
 * @property string|null $emitira_nc
 * @property string|null $condiciones_operacion
 * 
 * @property Cliente $cliente
 *
 * @package App\Models
 */
class MaestroCliente extends Model
{
	protected $table = 'maestro_cliente';
	protected $primaryKey = 'id_maestro_cliente';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_maestro_cliente' => 'int',
		'id_cliente' => 'int',
		'porc_retencion' => 'float',
		'comision' => 'float'
	];

	protected $fillable = [
		'id_cliente',
		'numero_cliente_icg',
		'numero_cliente',
		'nombre_comercial',
		'nombre_del_sujeto',
		'direccion',
		'pais',
		'codigo_pais',
		'ciudad',
		'departamento',
		'municipio',
		'telefono_fijo',
		'pagina_web',
		'correo',
		'telefono_celular',
		'paraiso_fiscal',
		'nombre_contacto',
		'telefono_contacto',
		'cargo_contacto',
		'pagina_web_contacto',
		'correo_contacto',
		'moneda_principal',
		'tipo_cambio',
		'giro_fical_negocio',
		'tipo_contribuyente',
		'nit_niff',
		'n_registro_fiscal',
		'cobra_iva',
		'entera_iva',
		'retencion_renta',
		'porc_retencion',
		'percepcion',
		'cta_pasivo_uno',
		'cta_pasivo_dos',
		'cta_activo_uno',
		'cta_activo_dos',
		'comision',
		'emitira_nc',
		'condiciones_operacion'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_cliente');
	}
}
