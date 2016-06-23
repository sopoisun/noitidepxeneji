<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['web_name', 'address', 'phone'];
    protected $hidden   = ['created_at', 'updated_at'];
}
