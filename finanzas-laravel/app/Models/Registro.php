<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Registro
 * 
 * @property int $id
 * @property string $descripcion
 * @property Carbon $fecha
 * @property float $monto
 * @property int|null $id_usuario
 * @property int|null $id_categoria
 * 
 * @property Usuario|null $usuario
 * @property Categorium|null $categorium
 *
 * @package App\Models
 */
class Registro extends Model
{
	protected $table = 'registro';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'monto' => 'float',
		'id_usuario' => 'int',
		'id_categoria' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'fecha',
		'monto',
		'id_usuario',
		'id_categoria'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'id_categoria');
	}
}
