<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'wechat_user_id', 'product_id', 'out_trade_no',
        'total_fee', 'price', 'body',
        'realname', 'birthday', 'sex', 'other_realname', 'other_birthday',
        'other_sex', 'share_from', 'content', 'type','birthtime', 'other_birthtime'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(__NAMESPACE__ . '\Product', 'id', 'product_id');
    }
}
