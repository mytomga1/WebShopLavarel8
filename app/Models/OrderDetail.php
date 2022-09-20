<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_detail"; // chi dinh ten CSDL

    public $timestamps = false;

    use HasFactory;

    public function order()
    {
        return $this->belongsTo('App\Order', 'id', 'order_id');
    }
}
