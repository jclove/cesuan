<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductClass extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];
}
