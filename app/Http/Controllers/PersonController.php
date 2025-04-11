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
        $total = DB::table('peopel')->count();

        // Probeer de opgeslagen procedure aan te roepen
        try {
            $peopel = DB::select('CALL Readpeopel(?, ?)', [$perPage, $offset]);
        } catch (\Exception $e) {
            // Lege array als de procedure niet bestaat of een fout optreedt
            $peopel = [];
        }

        // Maak een LengthAwarePaginator object voor paginering
        $peopel = new \Illuminate\Pagination\LengthAwarePaginator(
            $peopel, 
            $total, 
            $perPage, 
            $page, 
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        // Dump de opgehaalde 'peopel' data om te inspecteren
        // dd($peopel); // Voeg hier dd() toe om de data te inspecteren voor de view.


        // Retourneer de view met de personen
        return view('peopel.index', ['peopel' => $peopel]);
    }
}
