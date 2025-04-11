<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $perPage = 25;
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;

        $total = DB::table('reservations')->count();
        // Fetch all reservations from the database
        $reservations = \App\Models\Reservations::all();


        try {
            $reservations = DB::select('CALL SP_GetReservations(?, ?)', [$offset, $perPage]);
        } catch (\Exception $e) {
            Log::error('Error fetching reservations using stored procedure: ' . $e->getMessage());
            $reservations = [];
        }



        if (empty($reservations)) {
            Log::error('Stored procedure returned no data.');
            $reservations = [];
        }

        // paginate
        // Paginate the results
        $reservations = new \Illuminate\Pagination\LengthAwarePaginator($reservations, $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);
        // dd($reservations);
        // Return the view with reservations data
        return view('reservations.index', compact('reservations'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $resId)
    
{

    // Find the reservation by ID
    $reservation = DB::table('Lanes')->where('Id', $id)->first();

    // dd($reservation);
//    $reservation = DB::unprepared("select laneNumber form Lanes where Id = $id" );

    if (!$reservation) {
        return redirect()->route('reservations.index')->withErrors(['error' => 'Reservation not found.']);
    }

    // Pass the reservation to the view
    return view('reservations.edit', compact('reservation', 'resId'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'lane_number' => 'required|integer|min:1|max:10',
        ]);
    
        try {
            // Call the stored procedure to update the reservation
            DB::select('CALL SP_UpdateReservationLane(?, ?)', [$id, $request->input('lane_number')]);
            
            // Redirect with success message
    
            return redirect()->route('reservations.index')->with('success', 'Lane number updated successfully.');
        } catch (\Exception $e) {
            // Log the error and redirect with an error message
            Log::error('Error updating reservation: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the reservation.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
