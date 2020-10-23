<?php

namespace App\Listeners;

use App\Http\Business\WechatUserBusiness;
use Overtrue\LaravelWeChat\Events\WeChatUserAuthorized;

class WechatOauth
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(WechatUserBusiness $wechat_user_business)
    {
        $this->wechat_user_business = $wechat_user_business;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WeChatUserAuthorized $event)
    {
        $wechat_user_info = $event->user;
        $is_new_session = $event->isNewSession;
        if ($is_new_session || !session()->has('wechatUser')) {
            $wechat_user_info = $this->wechat_user_business->updateOrCreate($wechat_user_info->original)->toArray();
            session(['wechatUser' => $wechat_user_info]);
        }
    }
}
