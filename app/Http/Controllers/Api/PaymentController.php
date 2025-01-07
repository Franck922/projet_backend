<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('reservation')->get();
        return $payments;
    }

    // Afficher le formulaire de création d'un paiement pour une réservation
    public function create(Reservation $reservation)
    {
        return   response()->json(
            [
                    'message'=>'Paiement ajoutée avec succès']);
                }
        

    // Enregistrer un paiement
    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'required|string',
            'payment_status' => 'required|string',
        ]);

        // Enregistrer le paiement
        Payment::create($request->all());

        // Rediriger vers la liste des paiements avec un message de succès
      
return   response()->json(
    [
            'message'=>'methode de paiement bien ajouté']);
}
}
