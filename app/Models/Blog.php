<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model
{
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
//    public static function all(): array
//    {
//        return [
//            [
//                'id' => 1,
//                'title' => 'summer outfit',
//                'description' => 'outfit for the summer',
//            ],
//            [
//                'id' => 1,
//                'title' => 'winter outfit',
//                'description' => 'outfit for the winter',
//            ],
//            [
//                'id' => 1,
//                'title' => 'fall outfit',
//                'description' => 'outfit for the fall',
//            ]
//        ];
//    }
