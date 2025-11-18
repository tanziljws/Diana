<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryComment extends Model
{
    protected $fillable = ['user_id', 'gallery_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
