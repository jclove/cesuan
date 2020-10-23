<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hot extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'product_id', 'sort', 'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(__NAMESPACE__ . '\Product', 'id', 'product_id');
    }
}
