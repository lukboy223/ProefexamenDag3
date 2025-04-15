<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    
    // Map this model to the actual table name
    // protected $table = 'people';
    
    // Specify the primary key
    protected $primaryKey = 'Id';
    
    // Specify the custom timestamp columns
    const CREATED_AT = 'DatumAangemaakt';
    const UPDATED_AT = 'DatumGewijzigd';
    
    // Allow mass assignment
    protected $fillable = [
        'TypepeopleId',
        'FirstName',
        'Infix',
        'LastName',
        'PreferredName',
        'Adult',
        'IsActive',
        'Opmerking'
    ];

    // Define the relationship with TypePerson
    public function typePerson()
    {
        return $this->belongsTo(TypePerson::class, 'TypepeopleId', 'Id');
    }
}