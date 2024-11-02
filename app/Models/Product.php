<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Specify the table associated with the model
    protected $table = 'products';

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    // Optionally, you can define any casts for attributes
    protected $casts = [
        'price' => 'decimal:2', // Ensures the price is always a decimal with 2 decimal places
    ];

    // Optionally, define relationships if needed
    // public function someRelationship()
    // {
    //     return $this->hasMany(SomeRelatedModel::class);
    // }
}
