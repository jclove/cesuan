<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class WechatUser extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'openid', 'nickname', 'sex', 'city', 'province',
        'headimgurl', 'subscribe', 'subscribe_time', 'remark'
    ];

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
}
