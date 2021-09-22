<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //TODO Personalmente el full_name guardaría en la db unicamente username y surname. Y con un mutator crearía el full_name
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'full_name'
    ];

    /**
     * Relationship with comment
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user');
    }

}
