use App\Models\Word;

public function store(Request $request)
{
$word = $request->input('word');
$data = $this->fetchWord($word);

if (isset($data['error'])) {
return response()->json($data, 404);
}

$newWord = Word::updateOrCreate(
['word' => $word],
['meaning' => json_encode($data)]
);

return response()->json($newWord, 201);
}