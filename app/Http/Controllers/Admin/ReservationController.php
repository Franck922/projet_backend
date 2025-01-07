<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ReservationController extends Controller
{
    public function index()
    {
    $reservations = Reservation::with('user', 'flight')->paginate(10);
    return view('admin.reservations.index', compact('reservations'));
    }

// Affichage du formulaire de réservation
public function create()
{
    $flights = Flight::all(); // Liste des vols disponibles
    return $flights;
}

// Enregistrer une réservation
public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'flight_id' => 'required|exists:flights,id',
        'seats' => 'required|integer|min:1',
    ]);
    $flight = Flight ::findOrFail($request->flight_id);
    $totalPrice = $flight->price * $request->seats;

    Reservation ::create([
        'user_id' => $request->user_id,
        'flight_id' => $request->flight_id,
        'seats' => $request->seats,
        'total_price' => $totalPrice,
    ]);
    return   response()->json(
        [
                'message'=>'Reservation ajoutee avec succès']);
}

public function destroy($id)
{
    Reservation::findOrFail($id)->delete();
return   response()->json(
    [
            'message'=>'Reservation supprimée avec succès']);
}
public function edit($id)
{
    $reservation = Reservation::findOrFail($id);
    $users = User::all();
    $flights = Flight::all();
    return $flights;
}
public function update(Request $request, $id)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'flight_id' => 'required|exists:flights,id',
        'seats' => 'required|integer|min:1',
        'total_price'=> 'required|numeric|min:0',
    ]);
    $reservation = Reservation::findOrFail($id);
    $newReservation = $reservation->update([
    'user_id' => $request->user_id,
    'flight_id' => $request->flight_id,
    'seats'=> $request->seats,
    'total_price'=> $request->total_price,
    ]);
    return  $newReservation;
}
}



