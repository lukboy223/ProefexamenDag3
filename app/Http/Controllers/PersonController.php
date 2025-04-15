<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Log;

class PersonController extends Controller
{
    // Overzichtspagina met optionele datumfilter en paginatie
    public function index(Request $request)
    {
        $perPage = 25;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;
    
        $date = $request->input('datum');
    
        try {
            if ($date) {
                // Filter op datum (bijv. created_at in je view)
                $people = DB::table('people')
                    ->whereDate('created_at', '=', $date)
                    ->leftJoin('contacts', 'people.id', '=', 'contacts.person_id')
                    ->leftJoin('typepeople', 'people.type_id', '=', 'typepeople.id')
                    ->select('people.name', 'contacts.phone', 'contacts.email', 'people.adult', 'typepeople.TypeName', 'people.created_at')
                    ->leftJoin('contacts', 'peopel.id', '=', 'contacts.person_id')
                    ->select('peopel.name', 'contacts.phone', 'contacts.email', 'peopel.adult', 'peopel.created_at'
                    , 'peopel.Id')
                    ->get();
            } else {
                // Gebruik de stored procedure als er geen datum is
                $people = DB::select('CALL GetAllpeopleWithContactInfo()');
                } else {
                    // Gebruik de stored procedure als er geen datum is
                    $peopel = DB::select('CALL GetAllPeopelWithContactInfo()');
                    // dd($peopel);
            }
        } catch (\Exception $e) {
            Log::error('Fout bij ophalen van gegevens: ' . $e->getMessage());
            $people = collect(); // lege collection
        }
        // Debugging: Uncomment the line below to see the SQL query
        // dd($query->toSql(), $query->getBindings());
        // dd($peopel);
        //dd($peopel->first()->contacts);
        // Maak een paginator
        $total = count($people);
        $people = new \Illuminate\Pagination\LengthAwarePaginator(
            $people,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('people.index', ['people' => $people, 'selectedDate' => $date]);
    }
    
    public function edit($id)
    {
        // Use 'Id' with capital I to match your database column
        $person = DB::table('peopel')->where('Id', $id)->first();
        // tables joinen
        $person = DB::table('peopel')
            ->leftJoin('contacts', 'peopel.Id', '=', 'contacts.PeopelId')
            ->leftJoin('typepeople', 'peopel.TypePeopelId', '=', 'typepeople.Id')
            ->select('peopel.*', 'contacts.Phone', 'contacts.Email', 'typepeople.Name as TypePeopel')
            ->where('peopel.Id', $id)
            ->first();
        // Debugging: Uncomment the line below to see the SQL query
        // dd($person);
        
        // If person doesn't exist, redirect back with error
        if (!$person) {
            return redirect()->route('peopel.index')->with('error', 'Person not found');
        }
        
        // Pass the person to the view
        return view('peopel.edit', compact('person'));
    }

    // Bijwerken van de gegevens van een persoon
    public function update(Request $request, $id)
    {
        // Validatie
        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'Infix' => 'nullable|string|max:50',
            'LastName' => 'required|string|max:255',
            'Phone' => 'nullable|string|max:15',
            'Email' => 'nullable|email|max:255',
            'Adult' => 'boolean',
        ]);
    
        // Zet Adult op 0 als het vinkje niet is aangevinkt
        $validatedData['Adult'] = $request->has('Adult') ? 1 : 0;
    
        try {
            // Controleer of het e-mailadres al bestaat bij een andere klant
            $emailExists = DB::table('contacts')
                ->where('Email', $validatedData['Email'])
                ->where('PeopelId', '!=', $id)
                ->exists();
    
            if ($emailExists) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['Email' => 'Het e-mailadres is al in gebruik']);
            }
    
            // Update de peopel-tabel
            DB::table('peopel')->where('Id', $id)->update([
                'FirstName' => $validatedData['FirstName'],
                'Infix' => $validatedData['Infix'],
                'LastName' => $validatedData['LastName'],
                'Adult' => $validatedData['Adult'],
            ]);
    
            // Update de contacts-tabel
            DB::table('contacts')->where('PeopelId', $id)->update([
                'Phone' => $validatedData['Phone'],
                'Email' => $validatedData['Email'],
            ]);
    
            return redirect()->route('peopel.index')->with('success', 'Persoon succesvol bijgewerkt');
    
        } catch (\Exception $e) {
            Log::error('Fout bij updaten: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Er is een fout opgetreden bij het opslaan.');
        }
    }
    
    
}
