<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}