<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;
use Statamic\Facades\Content;


Route::get('articles/{slug}', function ($slug) {
    // Zoekt een artikel in de 'articles' collectie op basis van de slug
    $search = Entry::query()->where('slug', $slug)->where('collection', 'articles')->first();

    // Als er geen artikel wordt gevonden, geef een 404 foutmelding
    if (!$search) {
        abort(404);
    }

    // Geeft de detail view weer en stuurt de gevonden content mee
    /* de content is de word meegestuurd naar de pagina */
    // return view('detail', ['content' => $search]);
    return (new \Statamic\View\View)->template('detail')->layout('layout')->with(['content' => $search]);
});


Route::get('pages/register', function (){
   
    return (new \Statamic\View\View)->template('register')->layout('layout');
});



