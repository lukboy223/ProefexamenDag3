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
        $filterDate = $request->input('filter_date');

        try {
            if ($filterDate) {
                // Use the date filter stored procedure when it's ready
                // For now, we'll just call a different stored procedure with the date parameter
                $reservations = DB::select('CALL SP_GetReservationsByDate(?, ?, ?)', [
                    $filterDate,
                    $offset,
                    $perPage
                ]);

                // Count total filtered records
                $total = DB::select('SELECT COUNT(*) as total FROM Reservations WHERE Date = ?', [$filterDate])[0]->total ?? 0;
            } else {
                // Use the existing stored procedure for all reservations
                $reservations = DB::select('CALL SP_GetReservations(?, ?)', [$offset, $perPage]);
                $total = DB::table('reservations')->count();
            }
        } catch (\Exception $e) {
            Log::error('Error fetching reservations: ' . $e->getMessage());
            $reservations = [];
            $total = 0;
        }

        if (empty($reservations)) {
            Log::info('No reservations found' . ($filterDate ? ' for date: ' . $filterDate : ''));
        }

        // Paginate the results
        $reservations = new \Illuminate\Pagination\LengthAwarePaginator(
            $reservations,
            $total,
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

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


    public function Filter(Request $request)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $resId)
    {
        // Find the lane by ID
        $reservation = DB::table('Lanes')->where('Id', $id)->first();

        if (!$reservation) {
            return redirect()->route('reservations.index')->withErrors(['error' => 'Reservation not found.']);
        }

        // Get the reservation details
        $reservationDetails = DB::table('Reservations')->where('Id', $resId)->first();

        // Check if reservation exists and get the kid count
        // Use AmountKids or ChildCount or whatever the correct column name is
        // For now, default to 0 if the reservation or column doesn't exist
        $kidCount = 0;

        if ($reservationDetails) {
            // Inspect the object to see available properties
            $columns = array_keys(get_object_vars($reservationDetails));

            // Look for kid count column
            foreach (['KidCount', 'AmountKids'] as $possibleColumn) {
                if (property_exists($reservationDetails, $possibleColumn)) {
                    $kidCount = $reservationDetails->$possibleColumn;
                    break;
                }
            }

            // For debugging - you can remove this in production
            Log::info('Reservation columns: ' . implode(', ', $columns));
        }

        // Pass the reservation and kid count to the view
        return view('reservations.edit', compact('reservation', 'resId', 'kidCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Basic validation
        $request->validate([
            'lane_number' => 'required|integer|min:1|max:10',
        ]);

        // Get the reservation details
        $reservation = DB::table('Reservations')->where('Id', $id)->first();
        $kidCount = 0;

        if ($reservation) {
            // Find the appropriate kid count column
            foreach (['KidCount', 'AmountKids'] as $possibleColumn) {
                if (property_exists($reservation, $possibleColumn)) {
                    $kidCount = $reservation->$possibleColumn;
                    break;
                }
            }
        }

        // Custom validation for lanes 7-8 (only available if there are kids)
        $laneNumber = $request->input('lane_number');
        if (($laneNumber == 7 || $laneNumber == 8) && $kidCount <= 0) {
            return redirect()->back()
                ->withErrors(['lane_number' => 'Lanes 7 and 8 are only available for reservations with kids.'])
                ->withInput();
        }

        try {
            // Call the stored procedure to update the reservation
            DB::select('CALL SP_UpdateReservationLane(?, ?)', [$id, $laneNumber]);

            // Redirect with success message
            return redirect()->route('reservations.index')->with('success', 'De baannummer is gewijzigd.');
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
