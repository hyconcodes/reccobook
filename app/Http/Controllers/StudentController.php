<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function saveUserInterests(Request $request)
    {
        $request->validate([
            'catergories' => 'required|array',
            'catergories.*' => 'exists:catergories,id',
        ]);
        // dd($request->catergories);
        $user = auth()->id();

        Interest::where('user_id', $user)
            ->whereNotIn('catergory_id', $request->catergories)
            ->delete();

        foreach ($request->catergories as $cate) {
            Interest::updateOrCreate([
                'user_id' => $user,
                'catergory_id' => $cate
            ]);
        }

        return redirect()->back()->with('success', 'Interests saved successfully!');
    }
}
