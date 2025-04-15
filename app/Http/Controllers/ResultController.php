<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        try {

            $perPage = 25;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;

            $total = DB::table('Reservations')->count();

            // try catch looks if the SP exists

            $reservations = DB::select('call read_reservations(?, ?)', [$perPage, $offset]);

            foreach ($reservations as $reservation) {
                if ($reservation->AmountKids == null) {
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
        } catch (\Exception $e) {
            // Log de fout voor debugging doeleinden
            Log::error('Error loading reservations: ' . $e->getMessage());

            // Redirect terug met een foutmelding
            return redirect()->back()->with(
                'error',
                'Er is iets misgegaan bij het laden van de reservaties. Probeer het later opnieuw of neem contact op met de beheerder.'
            );
        }
    }

    public function show($id, Request $request)
    {
        try {

            $perPage = 25;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;

            $total = DB::table('Results')->count();

            // try catch looks if the SP exists

            $results = DB::select('call read_results(?, ?, ?)', [$id, $perPage, $offset]);

            foreach ($results as $result) {
                if ($result->AmountPoints == null) {
                    $result->AmountPoints = 0;
                }
            }

            //paginate

            $results = new LengthAwarePaginator($results, $total, $perPage, $page, [
                'path' => $request->url(),
                'query' => $request->query(),
            ]);

            //redirect the user to the index page with all the results
            if($results->isEmpty()){
                return redirect()->route('results.index')->with('error', 'Geen scores bij deze Reservation gevonden');
            }

            return view('Results.show', ['results' => $results]);
        } catch (\Exception $e) {
            // Log de fout voor debugging doeleinden
            Log::error('Error loading reservations: ' . $e->getMessage());

            // Redirect terug met een foutmelding
            return redirect()->back()->with(
                'error',
                'Er is iets misgegaan bij het laden van de scores. Probeer het later opnieuw of neem contact op met de beheerder.'
            );
        }
    }
    public function edit($id)
    {
        //try catch for the stored procedure
        try {
            //retrieves 1 row of data by id
            $result = DB::select('call read_result(?)', [$id]);

            if ($result[0]->AmountPoints == null) {
                $result[0]->AmountPoints = 0;
            }

            return view('Results.edit', ['result' => $result[0]]);

        } catch (\Exception $e) {
              // Logs the error if asking the data fails
            Log::error('Error loading reservations: ' . $e->getMessage());

            //  // Redirects the user back with feedback it failed
            return redirect()->back()->with(
                'error',
                'Er is iets misgegaan bij het laden van de score. Probeer het later opnieuw of neem contact op met de beheerder.'
            );
        }
    }

    public function update($id, Request $request) {

        //validates the data
        $request->validate([
            'AmountPoints' => 'required|int|min:0|max:300'
            ]);

            //try catch for running the stored procedure
            try{
                DB::select('call update_result(?, ?)', [$request->AmountPoints, $id]);

                //returns user to index with success messages if updated
                return redirect()->route('results.index')->with('success', 'score succesvol aangepast');
            }catch (\Exception $e) {
                // Logs the error if updating fails
                Log::error('Error loading reservations: ' . $e->getMessage());
    
                // Redirects the user back to the update from with feedback it failed
                return redirect()->route('results.edit', $id)->with(
                    'error',
                    'Er is iets misgegaan bij het laden van de score. Probeer het later opnieuw of neem contact op met de beheerder.'
                );
            }
    }
}
