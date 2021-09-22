<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'marks',
        'picture',
        'short_content',
        'content',
        'comment',
        'pending',
        'public',
        'active',
        'user'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'added', 'updated'
    ];

    /**
     * Relationship with comments through comment_post
     *
     * @return BelongsToMany
     */
    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'comment_post', 'blog', 'comment');
    }

    /**
     * Relationship with user
     *
     * @return HasOne
     */
    public function owner()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }

    /**
     * Relationship with category
     *
     * @return HasOne
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id');
    }

    /**
     * Relationship with users through comment_post
     *
     * @return BelongsToMany
     */
    public function writers()
    {
        return $this->belongsToMany(User::class, 'comment_post', 'blog', 'comment');
    }
}
