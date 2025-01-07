<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'flight_id',
        'seats',
        'total_price',
    ] ;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
