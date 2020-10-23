<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'wechat_user_id'
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
