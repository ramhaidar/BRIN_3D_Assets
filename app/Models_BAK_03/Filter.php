<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Filter
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Model[] $models
 *
 * @package App\Models
 */
class Filter extends Model
{
	protected $table = 'filters';

	protected $fillable = [
		'name'
	];

	public function models()
	{
		return $this->hasMany(Model::class);
	}
}
