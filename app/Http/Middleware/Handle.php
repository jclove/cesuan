<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Helper;
use Closure;
use Jenssegers\Agent\Facades\Agent;

class Handle
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle($request, Closure $next)
    {
        $is_weixin = 'no';
        $system_config = null;
        if (strpos($request->userAgent(), 'MicroMessenger') !== false) {
            $is_weixin = 'yes';
            // 获取配置信息
            $system_config_business = app('\App\Http\Business\SystemConfigBusiness');
            $system_config = $system_config_business->show();
            $system_config = json_decode($system_config->config, true);
        }
        session(['is_weixin' => $is_weixin]);
        view()->share('is_weixin', $is_weixin);
        view()->share('system_config', $system_config);
        view()->share('http_host', 'http://' . $request->server('HTTP_HOST'));
        view()->share('is_mobile', Agent::isMobile());
        $http_referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        if (empty($http_referer)) {
            return $next($request);
        }
        $keyword_info = Helper::urlKeyWord($http_referer);
        if (empty($keyword_info) || empty($keyword_info['keyword'])) {
            return $next($request);
        }
        $resource_business = app('\App\Http\Business\ResourceBusiness');
        // 请求保存资源
        $ip = $request->ip();
        $ip_info = Helper::getIpData($ip);
        $resource_business->store([
            'referer' => $keyword_info['referer'],
            'platform' => $keyword_info['platform'],
            'keyword' => $keyword_info['keyword'],
            'ip' => $ip,
            'region' => $ip_info['region'],
            'city' => $ip_info['city'],
        ]);
        return $next($request);
    }
}
