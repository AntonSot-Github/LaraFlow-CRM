<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function dials(): HasMany
    {
        return $this->hasMany(Deal::class);
    }
}
