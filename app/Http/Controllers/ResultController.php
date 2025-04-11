<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ResultController extends Controller
{
    public function index(Request $request){
        try{

            $perPage = 25;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
    
            $total = DB::table('Reservations')->count();
    
            // try catch looks if the SP exists
           
                $reservations = DB::select('call read_reservations(?, ?)', [$perPage, $offset]);

                foreach($reservations as $reservation){
                    if($reservation->AmountKids == null){
                        $reservation->AmountKids = 0;
                    }
                }
                // dd($reservations);
            
            //paginate
    
            $reservations = new LengthAwarePaginator($reservations, $total, $perPage, $page, [
                'path' => $request->url(),
                'query' => $request->query(),
            ]);
    
            //redirect the user to the index page with all the reservations

            return view('Results.index', ['reservations' => $reservations]);

        }catch (\Exception $e) {
            // Log de fout voor debugging doeleinden
            Log::error('Error loading reservations: ' . $e->getMessage());
            
            // Redirect terug met een foutmelding
            return redirect()->back()->with('error', 
                'Er is iets misgegaan bij het laden van de reservaties. Probeer het later opnieuw of neem contact op met de beheerder.');
        }
    }
}
