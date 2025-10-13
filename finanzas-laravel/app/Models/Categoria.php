<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property string $nombre
 * @property string $tipo
 * 
 * @property Collection|Registro[] $registros
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categoria';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'tipo'
	];

	public function registros()
	{
		return $this->hasMany(Registro::class, 'id_categoria');
	}
}
