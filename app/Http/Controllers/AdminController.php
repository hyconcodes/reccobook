<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Catergory;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function saveCatergory(Request $request)
    {
        $request->validate(['catergory' => 'required|unique:catergories,name']);
        Catergory::create(['name' => $request->catergory]);
        return redirect()->back()->with('success', 'Catergory created');
    }

    public function deleteCatergory($id)
    {
        $cate = Catergory::findOrFail($id);
        if ($cate) {
            $cate->delete();
            return redirect()->back()->with('success', 'Catergory deleted');
        }
    }
    public function deleteBook($id)
    {
        $book = Books::findOrFail($id);
        if ($book) {
            $book->delete();
            return redirect()->back()->with('success', 'Book deleted');
        }
    }
    public function viewBook($id)
    {
        $book = Books::with('catergory')->findOrFail($id);
        // dd($book);
        if ($book) {
            return view('admin.view_books', ['book' => $book]);
        }
    }
    public function viewVideo($id)
    {
        $video = Video::with('catergory')->findOrFail($id);
        // dd($video);
        if ($video) {
            return view('admin.view_video', ['video' => $video]);
        }
    }
    public function deleteVideo($id)
    {
        $videos = Video::findOrFail($id);
        if ($videos) {
            $videos->delete();
            return redirect()->back()->with('success', 'Video deleted');
        }
    }
    public function updateBook($id, Request $request)
    {
        $book = Books::findOrFail($id);
        $request->validate([
            'title' => 'sometimes|string',
            'book_catergory' => 'sometimes|exists:catergories,id',
            'book' => 'sometimes|file|mimes:pdf,doc,docx,epub,txt|max:30480'
        ]);
        $data = [];
        // updating only file
        if ($request->hasFile('book')) {
            $file_path = $request->file('book')->store('books', 'public');
            $data['path'] = $file_path;
        }
        // updating only title
        if ($request->filled('title')) {
            $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($request->title) . '&size=256&background=random';
            $data['title'] = $request->title;
            $data['cover_image'] = $avatarUrl;
        }
        // updating only catergory
        if ($request->filled('book_catergory')) {
            $data['catergory_id'] = $request->book_catergory;
        }
        $book->update($data);
        return redirect()->back()->with('success', 'Books updated...');
    }
    public function updateVideo($id, Request $request)
    {
        $video = Video::findOrFail($id);
        $request->validate([
            'title' => 'sometimes|string',
            'video_catergory' => 'sometimes|exists:catergories,id',
            'path' => 'sometimes|string'
        ]);
        $data = [];
        if ($request->filled('title')) {
            $data['title'] = $request->title;
            $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($request->title) . '&size=256&background=random';
            $data['cover_image'] = $avatarUrl;
        }
        if ($request->filled('path')) {
            $data['path'] = $request->path;
        }
        if ($request->filled('video_catergory')) {
            $data['catergory_id'] = $request->video_catergory;
        }
        $video->update($data);
        return redirect()->back()->with('success', 'Video updated');
    }
    public function searchbooks(Request $request)
    {
        $request->validate(['search' => 'min:3']);
        $book = Books::with('catergory')
            ->where('title', 'like', '%' . $request->search . '%')
            ->paginate(8);
        // dd($book);
        return view('admin.home', [
            'books' => $book
        ])->with('success', $request->search . 'results.....');
    }
    public function searchVideos(Request $request)
    {
        $request->validate(['search' => 'min:3']);
        $videos = Video::with('catergory')
            ->where('title', 'like', '%' . $request->search . '%')
            ->paginate(8);
        return view('admin.videos', [
            'videos' => $videos
        ])->with('success', $request->search . 'results.....');
    }
}
