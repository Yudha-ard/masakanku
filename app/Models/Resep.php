<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep';
    protected $fillable = ['judul','deskripsi','img_resep','kategori_id'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
