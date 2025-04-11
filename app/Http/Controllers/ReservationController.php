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
            $reservations = DB::table('reservations')
            ->join('people', 'reservations.PeopleId', '=', 'people.Id')
            ->join('lane', 'reservations.LaneId', '=', 'lane.Id')
            ->select(
                'reservations.*',
                'people.Name as PeopleName',
                'lane.Name as LaneName'
            )
            ->offset($offset)
            ->limit($perPage)
            ->get();
        } catch (\Exception $e) {
            Log::error('Error fetching reservations: ' . $e->getMessage());
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
        dd($reservations);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
