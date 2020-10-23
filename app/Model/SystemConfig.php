<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    protected $fillable = [
        'type', 'config'
    ];
}
