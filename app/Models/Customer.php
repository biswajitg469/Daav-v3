<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Specify the table name if it doesn't follow the convention
    protected $table = 'customers';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name', 
        'address_1', 
        'address_2', 
        'town', 
        'postcode', 
        'email', 
        'state', 
        'phone', 
        'name_ship', 
        'address_1_ship', 
        'address_2_ship', 
        'town_ship', 
        'postcode_ship', 
        'state_ship'
    ];
}
