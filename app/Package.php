<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['plugin_name', 'package_name', 'package_description', 'package_price', 'duration',];
}
