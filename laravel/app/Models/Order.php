<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['total_price', 'customer_id', 'order_date'];

    public function order_products() {
        return $this->hasMany(OrderProduct::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    protected function orderDate(): Attribute {
        return Attribute::make(
            // Mutator: Convert inputs format to MySQL format before saving
            set: fn ($value) => Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s'),

            // Accessor: Convert database format to user format when retrieving
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y H:i:s')
        );
    }
}
