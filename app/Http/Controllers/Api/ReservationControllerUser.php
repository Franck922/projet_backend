<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationControllerUser extends Controller
{

    public function store(Request $request)
{
    $request->validate([
        'flight_id' => 'required|exists:flights,id',
        'seats' => 'required|integer|min:1',
    ]);

    $flight = Flight::findOrFail($request->flight_id);
    $total_price = $flight->price * $request->seats;

    $reservation = Reservation::create([
        'user_id' => auth('')->id(),  // L'utilisateur connecté
        'flight_id' => $request->flight_id,
        'seats' => $request->seats,
        'total_price' => $total_price,
        'status' => 'En attente de paiement',
    ]);
}

    public function index(Request $request)
    {
        // Recherche avec filtres
        $reservations = Reservation::where('user_id', auth('')->id());

        if ($request->filled('flight')) {
            $reservations->whereHas('flight', function ($query) use ($request) {
                $query->where('flight_number', 'like', '%' . $request->flight . '%');
            });
        }

        if ($request->filled('date')) {
            $reservations->whereDate('created_at', $request->date);
        }

        // Pagination
        $reservations = $reservations->paginate(10);

        return $reservations;
    }
}
