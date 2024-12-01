<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderSlip extends Model
{
    protected $connection = 'pgsql1';

    protected $table='order_info';
}
