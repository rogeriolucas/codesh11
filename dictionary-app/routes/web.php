<?php 

use App\Http\Controllers\WordController; Route::get('/words', [WordController::class, 'index' ])->
    name('words.index');
    Route::post('/words/search', [WordController::class, 'search'])->name('words.search');


?>