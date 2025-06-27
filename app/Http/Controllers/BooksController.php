<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function saveBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'book_catergory' => 'required|exists:catergories,id',
            'book' => 'required|file|mimes:pdf,doc,docx,epub,txt|max:30480'
        ]);
        $file_path = $request->file('book')->store('books', 'public');
        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($request->title) . '&size=256&background=random';
        Books::create([
            'title' => $request->title,
            'catergory_id' => $request->book_catergory,
            'path' => $file_path,
            'cover_image' => $avatarUrl,
        ]);
        return back()->with('success', 'Book uploaded successfully!');
    }

    public function bookmarkBook(Books $book)
    {
        $user = Auth::user();
        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return redirect()->back()->with('message', 'Bookmark removed successfully!');
        }

        Bookmark::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);

        return redirect()->back()->with('message', 'Bookmarked successfully!');
    }
}
