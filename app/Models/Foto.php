<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';
    protected $primaryKey = 'id_f';

    protected $fillable = ['gallery_id', 'file', 'judul'];

    /**
     * Get the gallery that owns the photo
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id_g');
    }
}
