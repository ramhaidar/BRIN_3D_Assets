<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Model
 * 
 * @property int $id
 * @property string $name
 * @property string $file_path
 * @property string $description
 * @property bool $private
 * @property string $sha3_hash
 * @property int $view_count
 * @property int $like_count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 * @property int $category_id
 * @property int $filter_id
 * 
 * @property Category $category
 * @property Filter $filter
 * @property User $user
 * @property Collection|Download[] $downloads
 * @property Collection|Favorite[] $favorites
 * @property Collection|Rating[] $ratings
 *
 * @package App\Models
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
	protected $table = 'models';

	protected $casts = [
		'private' => 'bool',
		'view_count' => 'int',
		'like_count' => 'int',
		'user_id' => 'int',
		'category_id' => 'int',
		'filter_id' => 'int'
	];

	protected $fillable = [
		'name',
		'file_path',
		'description',
		'private',
		'sha3_hash',
		'view_count',
		'like_count',
		'user_id',
		'category_id',
		'filter_id'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function filter()
	{
		return $this->belongsTo(Filter::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function downloads()
	{
		return $this->hasMany(Download::class);
	}

	public function favorites()
	{
		return $this->hasMany(Favorite::class);
	}

	public function ratings()
	{
		return $this->hasMany(Rating::class);
	}
}
