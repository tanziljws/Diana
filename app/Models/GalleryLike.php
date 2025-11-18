<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryLike extends Model
{
    protected $fillable = ['user_id', 'gallery_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
