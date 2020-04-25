<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['user_id','customer_name','shipping_address','telephone','status','payment_method','grand_total'];

    const STATUS_PENDING=0;
    const STATUS_PROCESS=1;
    const STATUS_SHIPPING=2;
    const STATUS_COMPLETE=3;
    const STATUS_CANCEL=4;

    public function Products()
    {
        return $this->belongsToMany("\App\Product",'order_product','order_id','product_id')->withPivot('qty','price');
    }
}
