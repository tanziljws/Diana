<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id_p';

    protected $fillable = [
        'judul',
        'konten',
        'kategori_id',
        'status',
    ];

    /**
     * Get the category that owns the post
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_k');
    }

    /**
     * Get galleries for this post
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'post_id', 'id_p');
    }
}
