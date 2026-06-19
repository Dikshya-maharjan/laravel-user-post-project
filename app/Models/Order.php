<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Order extends Model
{
    //
    protected $fillable=['total','customer_id'];
    public function customer(){
        return $this->belongsTo(Customer::class);

    }
}
