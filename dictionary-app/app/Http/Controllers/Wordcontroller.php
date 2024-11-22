<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\History;

class WordController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $limit = $request->input('limit', 10);

        $cacheKey = "words_search_{$search}_limit_{$limit}";
        $cachedData = Cache::get($cacheKey);

        if ($cachedData) {
            return response()->json($cachedData)->header('x-cache', 'HIT');
        }

        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/pt", [
            'search' => $search,
            'limit' => $limit,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            Cache::put($cacheKey, $data, now()->addMinutes(10));
            return response()->json($data)->header('x-cache', 'MISS');
        }

        return response()->json(['error' => 'No words found'], 400);
    }

    public function show($word)
    {
        $user = auth()->user();
        History::create(['user_id' => $user->id, 'word' => $word]);

        $response = Http::get("https://api.dictionaryapi.dev/api/v2/entries/pt/$word");

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Word not found'], 400);
    }
}