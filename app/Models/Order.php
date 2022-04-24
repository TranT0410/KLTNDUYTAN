<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }

    public function orderDetails()
    {
        return $this->hasOne(OrderDetail::class);
    }
}