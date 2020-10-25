<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */


    protected $appends = ['profit', 'original_cost', 'viruchka'];

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function stock()
    {
        return $this->belongsTo(Stocks::class, 'product_id', 'product_id');
    }

    public function getProfitAttribute()
    {
        $profit = $this->attributes['sale_price'] * $this->attributes['sale_amount'] - $this->stock->entry_price *  $this->attributes['sale_amount'];
        return $profit;
    }

    public function getOriginalCostAttribute()
    {
        return $this->stock->entry_price * $this->attributes['sale_amount'];
    }

    public function getViruchkaAttribute()
    {
        return $this->attributes['sale_price'] * $this->attributes['sale_amount'];
    }
}
