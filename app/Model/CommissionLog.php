<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommissionLog extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'wechat_user_id', 'order_id', 'buy_user_id',
        'buy_total_fee', 'commission', 'proportion', 'finally'
    ];

    /**
     * 关联分类
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wechatUser()
    {
        return $this->hasOne(__NAMESPACE__ . '\WechatUser', 'id', 'buy_user_id');
    }

    /**
     * 关联分类
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function myWechatUser()
    {
        return $this->hasOne(__NAMESPACE__ . '\WechatUser', 'id', 'wechat_user_id');
    }
}
