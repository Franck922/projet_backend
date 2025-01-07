<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
{
    $flights = Flight::all();
    return $flights;
}
public function store(Request $request)
{
    $request->validate([
        'flight_number' => 'required|unique:flights',
        'departure_city' => 'required',
        'arrival_city' => 'required',
        'departure_time' => 'required|date',
        'arrival_time' => 'required|date',
        'price' => 'required|numeric',
        'seats_available' => 'required|integer',
    ]);
    Flight::create($request->all());
    return   response()->json(
        [
                'message'=>'Le vol a été ajouté avec succès']);
            }


public function edit($id)
{
    $flight = Flight::findOrFail($id);
    return $flight;
}

public function update(Request $request, $id)
{
    $request->validate([
        'flight_number' => 'required|unique:flights,flight_number,' . $id,
        'departure_city' => 'required',
        'arrival_city' => 'required',
        'departure_time' => 'required|date',
        'arrival_time' => 'required|date',
        'price' => 'required|numeric',
        'seats_available' => 'required|integer',
    ]);

    $flight = Flight::findOrFail($id);
    $flight->update($request->all());
    $flight = Flight::findOrFail($id);
    return  $flight ;
}

public function destroy($id)
{
    $flight = Flight::findOrFail($id);
    $flight->delete();
    return   response()->json(
        [
                'message'=>'Le vol a été supprimé avec succès']);
            }
public function search(Request $request)
    {
        $query = Flight::query();

        // Recherche simple (mot-clé)
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('flight_number', 'like', '%' . $request->keyword . '%')
                  ->orWhere('departure_city', 'like', '%' . $request->keyword . '%')
                  ->orWhere('arrival_city', 'like', '%' . $request->keyword . '%');
            });
        }

        // Filtres avancés
        if ($request->filled('departure_city')) {
            $query->where('departure_city', $request->departure_city);
        }

        if ($request->filled('arrival_city')) {
            $query->where('arrival_city', $request->arrival_city);
        }

        if ($request->filled('departure_date')) {
            $query->whereDate('departure_time', $request->departure_date);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Pagination
        $flights = $query->paginate(10);

        return view('admin.flights.index', compact('flights'));
    }
}


