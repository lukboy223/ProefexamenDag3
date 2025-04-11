<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePeople extends Model
{
    //
    protected $table = 'TypePeople';

    protected $fillable = [
        'Name',
        'DateCreated',
        'DateChanged',
    ];
}
