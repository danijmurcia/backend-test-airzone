<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'visible'
    ];

    /**
     * Relationship with comments through category_post table
     *
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Comment::class, 'category_post', 'id', 'blog');
    }
}
