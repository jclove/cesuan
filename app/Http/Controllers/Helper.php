<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use Overtrue\ChineseCalendar\Calendar;
use GuzzleHttp\Client;

class Helper
{
    /**
     * @param int $ip
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getIpData($ip = 0)
    {
        $return_data = [
            'region' => '',
            'city' => '',
        ];
        if (empty($ip)) {
            return $return_data;
        }
        // 请求ip信息
        $ip_info = self::postHttp('http://api-data.zunyue.me/api/ip-info', [
            'ip' => $ip,
        ]);

        if ($ip_info['error_code'] != 0) {
            return $return_data;
        }

        return $ip_info['body_data'];
    }

    /**
     * 农历（阴历）与阳历（公历）转换与查询工具
     * @param int $date
     */
    public static function calendar($date = 0)
    {
        $calendar = new Calendar();
        $timestamp = strtotime($date);
        return $calendar->solar(date('Y', $timestamp), date('m', $timestamp), date('d', $timestamp));
    }

    /**
     * 创建支付订单号
     * @return string
     */
    public static function createOutTradeNo($prefix = '')
    {
        /* 选择一个随机的方案 */
        mt_srand((double)microtime() * 1000000);
        return $prefix . date('YmdHis') . str_pad(mt_rand(1000, 9999), 5, '0', STR_PAD_LEFT) . rand(1000, 9999);
    }

    /**
     * 解析来源url关键词
     * @param null $referer
     */
    public static function urlKeyWord($referer = null)
    {
        $return_data = [
            'keyword' => '',
            'platform' => '',
            'referer' => '',
        ];
        if (empty($referer)) {
            return $return_data;
        }
        try {
            // 获取配置
            $expand_config = config('site.expand_config');
            // 解析url
            $parse_url_data = parse_url($referer);
            preg_match('/(?:yahoo.+?[\?|&]p=|openfind.+?query=|google.+?q=|lycos.+?query=|onseek.+?keyword=|search\.tom.+?word=|search\.qq\.com.+?word=|zhongsou\.com.+?word=|search\.msn\.com.+?q=|yisou\.com.+?p=|sina.+?word=|sina.+?query=|sina.+?_searchkey=|sohu.+?word=|sohu.+?key_word=|sohu.+?query=|163.+?q=|baidu.+?wd=|baidu.+?kw=|baidu.+?word=|3721\.com.+?p=|Alltheweb.+?q=|soso.+?w=|115.+?q=|youdao.+?q=|sm.+?q=|sogou.+?query=|sogou.+?keyword=|so.com.+?q=|bing.+?q=|114.+?kw=)([^&]*)/', urldecode($referer), $keyword);
            // 判断是否在配置中
            if (!isset($expand_config[$parse_url_data['host']])) {
                return $return_data;
            }
            if (isset($keyword[1]) && !empty($keyword[1])) {
                $encode = mb_detect_encoding($keyword[1], array('UTF-8', 'GB2312', 'GBK'));
                if ($encode != 'UTF-8') {
                    $keyword[1] = iconv('GB2312', 'UTF-8', $keyword[1]);
                }
                return [
                    'keyword' => $keyword[1],
                    'platform' => $expand_config[$parse_url_data['host']],
                    'referer' => urldecode($referer)
                ];
            }
        } catch (\Exception $e) {
            return $return_data;
        }
    }

    /**
     * @param string $url
     * @param array $params
     * @param array $header
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function postHttp($url = '', array $params = [], array $header = [])
    {
        $client = new Client([
            'timeout' => 5,
        ]);

        $response = $client->request('POST', $url, [
            'form_params' => $params,
            'headers' => $header
        ]);

        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents, true);
        if (empty($contents)) {
            return '';
        }
        return $contents;
    }

    /**
     * @param string $url
     * @param array $params
     * @param array $header
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function getHttp($url = '', array $params = [], array $header = [])
    {
        $client = new Client();

        $response = $client->request('GET', $url, [
            'query' => $params,
        ]);

        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents, true);
        if (empty($contents)) {
            return '';
        }
        return $contents;
    }

    /**
     * @return string
     */
    public static function getOrderType()
    {
        if (session('is_weixin') == 'yes') {
            return 'wechat';
        }
        $agent = new Agent();
        if ($agent->isMobile()) {
            return 'mobile';
        }
        return 'pc';
    }
}