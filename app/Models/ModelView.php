<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelView
 * 
 * @property int $id
 * @property int $model_id
 * @property string $ip_address
 * @property Carbon $viewed_at
 * 
 * @property Modelx $modelx
 *
 * @package App\Models
 */
class ModelView extends Model
{
	protected $table = 'model_views';
	public $timestamps = false;

	protected $casts = [
		'model_id' => 'int',
		'viewed_at' => 'datetime'
	];

	protected $fillable = [
		'model_id',
		'ip_address',
		'viewed_at'
	];

	public function modelx()
	{
		return $this->belongsTo(Modelx::class, 'model_id');
	}
}
