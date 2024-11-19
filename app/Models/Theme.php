<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
// On theme has many blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    use HasFactory;
}
