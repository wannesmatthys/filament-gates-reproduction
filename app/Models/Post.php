<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    public $fillable = [
        'title',
        'description'
    ];

    public function team(): BelongsTo {
        return $this->belongsTo(Team::class);
    }
}
