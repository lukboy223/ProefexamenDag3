<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TypePeople extends Model
{
    //

    use HasFactory;
    protected $table = 'TypePeople';

    protected $fillable = [
        'Name',
        'DateCreated',
        'DateChanged',
    ];
}
