<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desing extends Model
{
    protected $table = 'products';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'name',
        'description',
    ];
}
