<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;
use Statamic\Facades\Content;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;





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

/* Alle projecten pagina (overzichts pagina) */
Route::get('projects', function (){
   
    return (new \Statamic\View\View)->template('projects')->layout('layout');
});


Route::get('login', function (){
   
    return (new \Statamic\View\View)->template('admin')->layout('layout');
});


// Login formulier verwerken

Route::post('login', function (Request $request){
    $logingegevnes = $request->only('email', 'pssword');

    if(Auth::attempt($logingegevnes)){
        return redirect('/dashbord');
    }

    return redirect('login')->withErrors(['Inloggegevens onjuist']);

})->name('login');

/* dashbordpagina allen ingelogde */

Route::get('dashboard', function (){
    return (new \Statamic\View\View)->template('dashboard')->layout('layout');

});