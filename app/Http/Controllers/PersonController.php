<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Contact;

class PersonController extends Controller
{
    // Overzichtspagina met optionele datumfilter en paginatie
    public function index(Request $request)
    {
        $perPage = 25;
        $date = $request->input('datum');

        try {
            $query = Person::with('contacts');

            if ($date) {
                $query->whereDate('DatumAangemaakt', $date);
            }

            $peopel = $query->paginate($perPage)->appends(['datum' => $date]);

        } catch (\Exception $e) {
            \Log::error('Fout bij ophalen van personen: ' . $e->getMessage());
            $peopel = collect(); // lege collection
        }

        return view('peopel.index', [
            'peopel' => $peopel,
            'selectedDate' => $date
        ]);
    }

    // Bewerken van één persoon + bijbehorende contacten
    public function edit($id)
    {
        $person = Person::with('contacts')->findOrFail($id);
        return view('peopel.edit', ['person' => $person]);
    }

    // Bijwerken van de gegevens van een persoon
    public function update(Request $request, $id)
    {
        $request->validate([
            'FirstName' => 'required|string|max:50',
            'Infix' => 'nullable|string|max:10',
            'LastName' => 'required|string|max:50',
            'PreferredName' => 'required|string|max:50',
            'Adult' => 'required|boolean',
            'contacts.*.phone' => 'nullable|string|max:255',
            'contacts.*.email' => 'nullable|email|max:255',
        ]);

        $person = Person::findOrFail($id);
        $person->update([
            'FirstName' => $request->input('FirstName'),
            'Infix' => $request->input('Infix'),
            'LastName' => $request->input('LastName'),
            'PreferredName' => $request->input('PreferredName'),
            'Adult' => $request->input('Adult'),
        ]);

        // Contactgegevens bijwerken of toevoegen
        if ($request->has('contacts')) {
            foreach ($request->input('contacts') as $contactData) {
                Contact::updateOrCreate(
                    [
                        'person_id' => $person->Id,
                        'phone' => $contactData['phone'] ?? null,
                    ],
                    [
                        'email' => $contactData['email'] ?? null,
                    ]
                );
            }
        }

        return redirect()->route('peopel.index')->with('success', 'Persoon succesvol bijgewerkt.');
    }
}
