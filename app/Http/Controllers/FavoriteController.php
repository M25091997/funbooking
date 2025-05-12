<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Park;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('park')->get();
        return view('favorites.index', compact('favorites'));
    }

    public function addFavorite($park_id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Please log in to continue'], 200);
        }
        $user = Auth::user();
        $existingFavorite = Favorite::where('user_id', $user->id)->where('park_id', $park_id)->first();

        if ($existingFavorite) {
            return response()->json(['message' => 'Park already in favorites'], 200);
        }

        Favorite::create([
            'user_id' => $user->id,
            'park_id' => $park_id,
            'status' => true,
        ]);

        return response()->json(['message' => 'Park added to favorites'], 200);
    }

    public function removeFavorite($park_id)
    {
        Favorite::where('user_id', Auth::id())->where('park_id', $park_id)->delete();
        return response()->json(['message' => 'Park removed from favorites'], 200);
    }
}
