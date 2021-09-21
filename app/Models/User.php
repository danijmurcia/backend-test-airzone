<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'user';

    //TODO Personalmente el full_name guardaria en la db unicamente username y surname. Y con un mutator crearia el full_name en el mismo modelo

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'full_name'
    ];
}
