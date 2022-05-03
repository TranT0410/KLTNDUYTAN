<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = [
        'order_id', 'user_id', 'status'
    ];
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}