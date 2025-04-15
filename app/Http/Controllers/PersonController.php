<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    // overview
    public function index(Request $request)
    {
        $perPage = 25;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;
    
        $date = $request->input('datum');
        $errorMessage = null;
    
        try {
            if ($date) {
                // Filter op datum
                $peopel = DB::table('peopel')
                    ->whereDate('created_at', '=', $date)
                    ->leftJoin('contacts', 'peopel.id', '=', 'contacts.person_id')
                    ->leftJoin('typepeople', 'peopel.type_id', '=', 'typepeople.id')
                    ->select('peopel.FirstName', 'peopel.Infix', 'peopel.LastName', 'contacts.Phone', 'contacts.Email', 'peopel.Adult', 'typepeople.TypeName', 'peopel.created_at')
                    ->orderBy('peopel.LastName', 'asc')
                    ->get();
    
                if ($peopel->isEmpty()) {
                    $errorMessage = "Er is geen informatie beschikbaar voor deze geselecteerde datum ($date).";
                }
            } else {
                // Gebruik stored procedure
                $peopel = collect(DB::select('CALL GetAllPeopelWithContactInfo()'));
            }
        } catch (\Exception $e) {
            \Log::error('Fout bij ophalen van gegevens: ' . $e->getMessage());
            $peopel = collect();
            $errorMessage = "Er is iets misgegaan bij het ophalen van de gegevens.";
        }
    
        // Maak een paginator
        $total = count($peopel);
        $peopel = new \Illuminate\Pagination\LengthAwarePaginator(
            $peopel,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('peopel.index', [
            'peopel' => $peopel,
            'selectedDate' => $date,
            'errorMessage' => $errorMessage,
        ]);
    }
}
