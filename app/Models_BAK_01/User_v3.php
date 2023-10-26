<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
 * @property Collection|Download[] $downloads
 * @property Collection|Favorite[] $favorites
 * @property Collection|Like[] $likes
 * @property Collection|Modelx[] $modelxes
 * @property Collection|Rating[] $ratings
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
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function downloads ()
	{
		return $this->hasMany ( Download::class);
	}

	public function favorites ()
	{
		return $this->hasMany ( Favorite::class);
	}

	public function likes ()
	{
		return $this->hasMany ( Like::class);
	}

	public function modelxes ()
	{
		return $this->hasMany ( Modelx::class);
	}

	public function ratings ()
	{
		return $this->hasMany ( Rating::class);
	}

	public function roles ()
	{
		return $this->belongsToMany ( Role::class);
	}
}