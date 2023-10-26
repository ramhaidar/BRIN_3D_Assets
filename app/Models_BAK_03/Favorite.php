<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Model;

/**
 * Class Favorite
 * 
 * @property int $user_id
 * @property int $model_id
 * 
 * @property Model $model
 * @property User $user
 *
 * @package App\Models
 */
class Favorite extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'favorites';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [ 
		'user_id'  => 'int',
		'model_id' => 'int'
	];

	public function model ()
	{
		return $this->belongsTo ( Model::class);
	}

	public function user ()
	{
		return $this->belongsTo ( User::class);
	}
}