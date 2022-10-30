<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use \Cviebrock\EloquentSluggable\src\Services\SlugService;
// use \Cviebrock\EloquentSluggable\Services\SlugService;

class Post extends Model
{
    use HasFactory, Sluggable;
    public $timestamp = false;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug'
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
