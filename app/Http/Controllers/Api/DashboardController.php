<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function getStats(): JsonResponse
    {
        $totalUsers = User::count();
        $totalFlights = Flight::count();
        $totalReservation = Reservation::count();
        $totalAdmins = User::where('userType', 'Admin') // Suppose que le rôle Admin est défini ainsi
        ->count();

        return response()->json([
            'total_users' => $totalUsers,
            'total_flights' => $totalFlights,
            'total_admins' => $totalAdmins,
            'total_reservations'=> $totalReservation,
        ]);
    }
}
