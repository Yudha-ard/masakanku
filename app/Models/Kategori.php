<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    protected $fillable = ['nama', 'img_kategori', 'deskripsi'];
    public function resep()
    {
        return $this->hasMany(Resep::class);
    }
}
