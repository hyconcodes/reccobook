<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

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

    // public function 
}
