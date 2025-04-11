<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class People extends Model
{
   
    use HasFactory;
    protected $table = 'People';

    protected $fillable = [
        'TypePeopleIdd'
        ,'FirstaaName'
        ,'Tussfenvoegsel'
        ,'LastName'
        ,'Nicknaame'
        ,'IsAdssult'
    ];
}
