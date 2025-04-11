<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    // overview
    public function index(Request $request)
    {
        // Variabelen voor paginering
        $perPage = 25;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;

        // Haal het totaal aantal personen op (voor paginering)
        $total = DB::table('persons')->count();

        // Probeer de opgeslagen procedure aan te roepen
        try {
            $persons = DB::select('CALL ReadPersons(?, ?)', [$perPage, $offset]);
        } catch (\Exception $e) {
            // Lege array als de procedure niet bestaat of een fout optreedt
            $persons = [];
        }

        // Maak een LengthAwarePaginator object voor paginering
        $persons = new \Illuminate\Pagination\LengthAwarePaginator(
            $persons, 
            $total, 
            $perPage, 
            $page, 
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        // Retourneer de view met de personen
        return view('persons.index', ['persons' => $persons]);
    }
}
