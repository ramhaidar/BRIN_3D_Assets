<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Favorite[] $favorites
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'users';

	protected $casts = [ 
		'email_verified_at' => 'datetime',
		'password'          => 'hashed',
	];

	protected $hidden = [ 
		'password',
		'remember_token'
	];

	protected $fillable = [ 
		'username',
		'email',
		'password',
	];

	public function favorites ()
	{
		return $this->hasMany ( Favorite::class);
	}

	public function roles ()
	{
		return $this->belongsToMany ( Role::class);
	}
}