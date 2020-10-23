<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'order_id', 'referer', 'platform',
        'keyword', 'ip', 'region', 'city', 'product_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(__NAMESPACE__ . '\Product', 'id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne(__NAMESPACE__ . '\Order', 'id', 'order_id');
    }
}
