<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePerson extends Model
{
    use HasFactory;
    
    // Map this model to the actual table name
    protected $table = 'TypePeople';
    
    // Specify the primary key
    protected $primaryKey = 'Id';
    
    // Specify the custom timestamp columns
    const CREATED_AT = 'DatumAangemaakt';
    const UPDATED_AT = 'DatumGewijzigd';
    
    // Allow mass assignment
    protected $fillable = ['Name', 'IsActive', 'Opmerking'];

    // Define the relationship with Person
    public function people()
    {
        return $this->hasMany(Person::class, 'TypepeopleId', 'Id');
    }
}
