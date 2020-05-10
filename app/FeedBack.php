<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = 'feedback';
    protected $fillable = ['rate','telephone','name','email','message'];

    public function feedbacks()
    {
        return $this->belongsToMany("\App\Product",'product','product_id');
    }
}
