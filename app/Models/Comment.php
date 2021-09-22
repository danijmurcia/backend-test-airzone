<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'content'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'datetime'
    ];

    /**
     * Relationship with post
     *
     * @return HasOne
     */
    public function post()
    {
        return $this->hasOne(Post::class, 'id');
    }

    /**
     * Relationship with user
     *
     * @return BelongsTo
     */
    public function writer()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
