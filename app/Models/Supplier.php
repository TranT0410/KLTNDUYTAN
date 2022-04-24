<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone',
        'user_id'
    ];
    public function taxation()
    {
        return $this->hasMany(Tax::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}