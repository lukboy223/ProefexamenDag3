<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    // Map this model to the actual table name
    protected $table = 'Contacts';
    
    // Specify the primary key
    protected $primaryKey = 'Id';
    
    // Specify the custom timestamp columns
    const CREATED_AT = 'DatumAangemaakt';
    const UPDATED_AT = 'DatumGewijzigd';
    
    // Allow mass assignment
    protected $fillable = [
        'PeopelId',
        'Phone',
        'Email',
        'IsActive',
        'Opmerking'
    ];
    
    // Define the relationship with Person/Peopel
    public function person()
    {
        return $this->belongsTo(Person::class, 'PeopelId', 'Id');
    }
}
