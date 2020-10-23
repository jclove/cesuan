<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CashLog extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'wechat_user_id', 'out_trade_no', 'total_fee'
    ];

    /**
     * 关联分类
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wechatUser()
    {
        return $this->hasOne(__NAMESPACE__ . '\WechatUser', 'id', 'wechat_user_id');
    }
}
