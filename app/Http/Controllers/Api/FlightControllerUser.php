<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightControllerUser extends Controller
{
    public function index(Request $request)
    {
        // Recherche avec filtres
        $flights = Flight::query();

        if ($request->filled('destination')) {
            $flights->where('destination', 'like', '%' . $request->destination . '%');
        }

        if ($request->filled('date')) {
            $flights->whereDate('departure_time', $request->date);
        }
        $searchFlights = $flights;
        // Pagination des résultats
        $flights = $flights->paginate(10);
        return $searchFlights;
    }
}
