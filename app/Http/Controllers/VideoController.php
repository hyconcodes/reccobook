<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function bookmarkVideo(Video $video)
    {
        $user = Auth::user();
        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('video_id', $video->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return redirect()->back()->with('message', 'Bookmark removed successfully!');
        }

        Bookmark::create([
            'user_id' => $user->id,
            'video_id' => $video->id,
        ]);

        return redirect()->back()->with('message', 'Bookmarked successfully!');
    }
}
