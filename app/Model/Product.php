<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'pid', 'identity',
        'alias', 'total_fee','wechat_total_fee',
        'price', 'status', 'desc'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hot()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Hot', 'id', 'product_id');
    }
}
