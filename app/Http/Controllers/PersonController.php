<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonController extends Controller
{
    // overview
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
                    ->get();
            } else {
                // Gebruik de stored procedure als er geen datum is
                $people = DB::select('CALL GetAllpeopleWithContactInfo()');
            }
        } catch (\Exception $e) {
            Log::error('Fout bij ophalen van gegevens: ' . $e->getMessage());
            $people = collect(); // lege collection
        }
    
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
    
}
