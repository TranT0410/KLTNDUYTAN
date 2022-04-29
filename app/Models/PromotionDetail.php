<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'promotion_id', 'product_id', 'rate', 'description'
    ];
    protected $table = 'promotion_detail';
    public function promotions()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}