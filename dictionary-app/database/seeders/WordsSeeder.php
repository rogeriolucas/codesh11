// database/seeders/WordsSeeder.php

public function run()
{
\App\Models\Word::create([
'word' => 'example',
'definition' => 'A representative form or pattern of something.'
]);
}