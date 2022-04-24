<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'taxation';

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }
}