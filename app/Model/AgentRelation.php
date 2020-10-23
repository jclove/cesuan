<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AgentRelation extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'pid', 'wechat_user_id', 'level'
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
