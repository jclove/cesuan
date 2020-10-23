<?php

namespace App\Http\Middleware;

use Closure;

class AgentRelation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (strpos($request->userAgent(), 'MicroMessenger') === false) {
            return $next($request);
        }
        view()->share('share_url', route('web.index',['share_uuid' => session('wechatUser.uuid')]));
        $share_uuid = $request->get('share_uuid');
        if (empty($share_uuid)) {
            return $next($request);
        }
        $uuid = session('wechatUser.uuid');
        if ($share_uuid == $uuid) {
            return $next($request);
        }
        $wechat_user_business = app('\App\Http\Business\WechatUserBusiness');
        $share_user_info = $wechat_user_business->getUUid($share_uuid);
        if (empty($share_user_info)) {
            return $next($request);
        }
        $agent_relation_business = app('\App\Http\Business\AgentRelationBusiness');
        $wechat_user_id = session('wechatUser.id');
        $agent_relation_business->relation($wechat_user_id, $share_user_info->id);
        return $next($request);
    }
}
