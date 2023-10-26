<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rating
 * 
 * @property int $id
 * @property int $user_id
 * @property int $model_id
 * @property int $rating
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Modelx $modelx
 * @property User $user
 *
 * @package App\Models
 */
class Rating extends Model
{
	protected $table = 'ratings';

	protected $casts = [
		'user_id' => 'int',
		'model_id' => 'int',
		'rating' => 'int'
	];

	protected $fillable = [
		'user_id',
		'model_id',
		'rating'
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
