<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';
    protected $primaryKey = 'id_g';

    protected $fillable = [
        'post_id',
        'position',
        'status',
    ];

    /**
     * Get the post that owns the gallery
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id_p');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'gallery_id', 'id_g');
    }
}
