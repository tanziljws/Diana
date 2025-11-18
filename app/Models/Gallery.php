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
        'judul',
        'deskripsi',
        'kategori_id',
        'post_id',
        'position',
        'status',
        'views',
    ];

    /**
     * Get the post that owns the gallery
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id_p');
    }

    /**
     * Get the kategori that owns the gallery
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id_k');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'gallery_id', 'id_g');
    }
}
