<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded  = ['id' , 'created_at' , 'updated_at'];
    protected $fillable = ['themeTitle'];
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    use HasFactory;
}
