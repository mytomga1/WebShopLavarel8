<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // relationship one to many
    public function details()
    {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }
}
