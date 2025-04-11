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
    
        try {
            if ($date) {
                // Filter op datum (bijv. created_at in je view)
                $peopel = DB::table('peopel')
                    ->whereDate('created_at', '=', $date)
                    ->leftJoin('contacts', 'peopel.id', '=', 'contacts.person_id')
                    ->leftJoin('typepeople', 'peopel.type_id', '=', 'typepeople.id')
                    ->select('peopel.name', 'contacts.phone', 'contacts.email', 'peopel.adult', 'typepeople.TypeName', 'peopel.created_at')
                    ->get();
            } else {
                // Gebruik de stored procedure als er geen datum is
                $peopel = DB::select('CALL GetAllPeopelWithContactInfo()');
            }
        } catch (\Exception $e) {
            \Log::error('Fout bij ophalen van gegevens: ' . $e->getMessage());
            $peopel = collect(); // lege collection
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
    
        return view('peopel.index', ['peopel' => $peopel, 'selectedDate' => $date]);
    }
    
}
