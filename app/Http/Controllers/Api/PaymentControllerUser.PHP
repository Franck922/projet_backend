<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class PaymentControllerUser extends Controller
{
public function create(Reservation $reservation)
{
    return $reservation ;
}
public function store(Request $request, Reservation $reservation)
{
    $request->validate([
        'amount' => 'required|numeric|min:0',
    ]);

    // Traitement du paiement (simulation ou intégration API)
    $reservation->status = 'Payé';  // Mettre à jour le statut de la réservation
    $reservation->save();
    return   response()->json(
        [
                'message'=>'Paiement effectué avec succès!']);
          }
}
