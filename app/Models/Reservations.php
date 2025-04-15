<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Reservations extends Model
{
    //
    use HasFactory;
    protected $table = 'Reservations';
    protected $fillable = [
        'PeopleId',
        'OpeningTimeId',
        'LaneId',
        'PackageId',
        'ReservationStatus',
        'Reservationsnummer',
        'Date',
        'AmmountHours',
        'StartTime',
        'EndTime',
        'AmmountAdults',
        'AmmountKids',
    ];
}
