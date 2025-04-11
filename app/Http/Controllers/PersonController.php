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
            \Log::error('Fout bij het oproepen van de stored procedure: ' . $e->getMessage());
            $peopel = [];
        }

        // Controleer of de procedure bestaat
        if (empty($peopel)) {
            \Log::warning('Geen personen gevonden.');
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

        // dd($peopel);
        

        // // Stel de paginering in voor de zichtbare pagina's
        // $peopel->onEachSide(1);  // Laat 1 pagina aan elke kant van de huidige pagina zien

        // Retourneer de view met de personen
        return view('peopel.index', ['peopel' => $peopel]);
    }
}
