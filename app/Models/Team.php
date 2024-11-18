<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory;

    public $fillable = [
        'team',
        'slug'
    ];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function posts(): HasMany {
        return $this->hasMany(Team::class);
    }
}
