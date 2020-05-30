<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'Productname', 'ProductDescription', 'ProductSize','Price','image','user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}