<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['userId', 'packageId', 'expire_date','plugin_name',];
}
