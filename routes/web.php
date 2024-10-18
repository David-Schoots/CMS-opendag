<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;
use Statamic\Facades\Content;




// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);

/*  Route::statamic('article/{slug}', 'detail', [
    'title' => 'Example'
]); */

/* Route::statamic('articles/{slug}', 'detail');
 *//* Route::get('/articles/{slug}', function ($slug) {

    $articles = Statamic::api('collections')->findBySlug($slug, 'articles');

    if (!$articles){
        abort(404);
    }

    return view('articles.show',['aricles' => $articles]);
 }); */




Route::get('articles/{slug}', function ($slug) {
    // Zoekt een artikel in de 'articles' collectie op basis van de slug
    $search = Entry::query()->where('slug', $slug)->where('collection', 'articles')->first();

    // Als er geen artikel wordt gevonden, geef een 404 foutmelding
    if (!$search) {
        abort(404);
    }

    // Geeft de detail view weer en stuurt de gevonden content mee
    /* de content is de word meegestuurd naar de pagina */
    return view('detail', ['content' => $search]);
});

