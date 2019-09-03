<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $fillable = ['userId','package_id','transaction_id','receipt_url','amount',];
}
