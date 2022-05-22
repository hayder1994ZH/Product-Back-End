<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rules extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'created_at', 'update_at'
    ];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i:s');
    }
    protected $relations = [
        'users',
    ];

    //Relations
    public function users()
    {
        return $this->hasMany(User::class, 'rule_id');
    }

}
