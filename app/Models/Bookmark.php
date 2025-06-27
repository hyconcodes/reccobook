<?php

namespace App\Models;

use App\Models\Books;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'video_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Books::class);
    }
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
