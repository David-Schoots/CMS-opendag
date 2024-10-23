<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Entries\Entry; // Vergeet niet deze regel toe te voegen

class FormController extends Controller
{
    public function submit(Request $request)
    {
        // Valideer de gegevens
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'comments' => 'nullable|string|max:500',
        ]);

        $entry = Entry::make()
            ->collection('aanmeldingen')
            ->data($validatedData)
            ->save();

        // Redirect naar een andere pagina met een succesmelding
       /*  return redirect()->route('pages/register')->with('success', 'Aanmelding succesvol!'); */
        return redirect ('pages/register')->with('success', 'Aanmelding successvol!');
    }
}
