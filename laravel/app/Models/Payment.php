<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['payment_method', 'amount', 'order_id', 'customer_id'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
