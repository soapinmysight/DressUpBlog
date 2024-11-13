<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model
{
    // fillable for update functionalities
    protected $fillable = ['title', 'description', 'user_id', 'active', 'image']; // Maybe delete user_id since it doesnt change

    // Blog belongs to a user, so add belongs relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Blog has many comments, so add has many relationship
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
