<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lanes extends Model
{
    //
    use HasFactory;
    protected $table = 'Lanes';

    protected $fillable = [
        'Number',
        'HasFence',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservations::class, 'LaneId', 'Id');
    }
}
