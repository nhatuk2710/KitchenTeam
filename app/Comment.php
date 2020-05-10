<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['message','product_id','user_id'];

    public function User(){
        $this->belongsTo("\App\User");
    }
}
