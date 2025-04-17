<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'cover_image',
        'catergory_id',
    ];

    public function catergory()
    {
        return $this->belongsTo(Catergory::class, 'catergory_id');
    }
}
