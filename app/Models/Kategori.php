<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_k';
    protected $fillable = ['kategori'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'kategori_id', 'id_k');
    }
    
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'kategori_id', 'id_k');
    }
}
