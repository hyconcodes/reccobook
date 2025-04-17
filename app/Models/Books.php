<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'catergory_id',
        'path',
        'cover_image',
    ];

    public function catergory()
    {
        return $this->belongsTo(Catergory::class, 'catergory_id');
    }
}
