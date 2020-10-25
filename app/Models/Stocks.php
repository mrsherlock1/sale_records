<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Stocks extends Model
{
    use HasFactory;

    protected $table = 'stock';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
