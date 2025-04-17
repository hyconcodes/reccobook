<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function saveVideo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:videos,title|max:255',
            'path' => 'required|string|',
            'video_catergory' => 'required|exists:catergories,id',
        ]);
        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($request->title) . '&size=256&background=random';
        Video::create([
            'title' => $request->title,
            'path' => $request->path,
            'cover_image' => $avatarUrl,
            'catergory_id' => $request->video_catergory
        ]);
        return redirect()->back()->with('success', 'Video Saved');
    }
}
