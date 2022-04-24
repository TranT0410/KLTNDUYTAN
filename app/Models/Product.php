<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'quantity', 'image', 'price', 'category_id'
    ];

    public function promotionDetails()
    {
        return $this->hasOne(Promotion::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}