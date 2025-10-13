<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $nombre
 * @property string $username
 * @property string $password
 * @property float|null $saldo
 * 
 * @property Collection|Registro[] $registros
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
	protected $table = 'usuario';
	public $timestamps = false;

	protected $casts = [
		'saldo' => 'float'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nombre',
		'username',
		'password',
		'saldo'
	];

	public function registros()
	{
		return $this->hasMany(Registro::class, 'id_usuario');
	}
}
