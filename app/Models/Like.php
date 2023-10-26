<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Like
 * 
 * @property int $id
 * @property int $user_id
 * @property int $model_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Modelx $modelx
 * @property User $user
 *
 * @package App\Models
 */
class Like extends Model
{
	protected $table = 'likes';

	protected $casts = [
		'user_id' => 'int',
		'model_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'model_id'
	];

	public function modelx()
	{
		return $this->belongsTo(Modelx::class, 'model_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
