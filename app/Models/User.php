<?php

namespace App\Models;

use App\Models\RelationshipsTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, RelationshipsTrait;

    protected $fillable = [
        'id',
        'name',
        'username',
        'phone',
        'password',
        'rule_id',
        'created_at',
        'updated_at'
    ];
    protected $relations = [
        'rule'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    //Relations
    public function reels()
    {
        return $this->hasMany(Reels::class);
    }
    public function rule()
    {
        return $this->belongsTo(Rules::class);
    }
}
