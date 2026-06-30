<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Program;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->with('program.university')
            ->latest()
            ->get();

        return view('student.wishlist.index', compact('wishlist'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'program_id' => 'required|exists:programs,id',
        ]);

        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('program_id', $request->program_id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            $status = 'removed';
            $message = 'Program removed from wishlist.';
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'program_id' => $request->program_id,
            ]);
            $status = 'added';
            $message = 'Program added to wishlist.';
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => $status,
                'message' => $message
            ]);
        }

        return back()->with('success', $message);
    }
}
