<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Download
 * 
 * @property int $id
 * @property int $user_id
 * @property int $model_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Model $model
 * @property User $user
 *
 * @package App\Models
 */
class Download extends Model
{
	protected $table = 'downloads';

	protected $casts = [
		'user_id' => 'int',
		'model_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'model_id'
	];

	public function model()
	{
		return $this->belongsTo(Model::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
