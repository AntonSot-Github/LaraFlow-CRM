<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
}
