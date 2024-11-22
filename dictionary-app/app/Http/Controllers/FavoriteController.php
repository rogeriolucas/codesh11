<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FavoriteController extends Controller
{
    public function add($word)
    {
        $user = auth()->user();
        $user->favorites()->create(['word' => $word]);

        return response()->json(['message' => 'Word added to favorites'], 200);
    }

    public function remove($word)
    {
        $user = auth()->user();
        $user->favorites()->where('word', $word)->delete();

        return response()->json(['message' => 'Word removed from favorites'], 204);
    }
}