<?php

namespace App\Models;

use App\Traits\ApiKey;
use App\Traits\ApiResource;
use App\Traits\UUID;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
//use Illuminate\Contracts\Auth\MustVerifyEmail;

/**
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 * @property string api_key
 * @property DateTime email_verified_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, ApiResource, UUID, HasRolesAndAbilities, ApiKey;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token', 'api_key'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(): Relation {
        return $this->hasMany(Article::class, 'user_id', 'id');
    }

    public function comments(): Relation {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

}
