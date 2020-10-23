<?php

namespace Yansongda\LaravelPay;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Yansongda\Pay\Pay;

class PayServiceProvider extends ServiceProvider
{
    /**
     * If is defer.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service.
     *
     * @author yansongda <me@yansongda.cn>
     */
    public function boot()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__).'/config/pay.php' => config_path('pay.php'), ],
                'laravel-pay'
            );
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('pay');
        }
    }

    /**
     * Register the service.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/pay.php', 'pay');

        $this->app->singleton('pay.alipay', function ($app, array $config = []) {
            return Pay::alipay(array_merge(config('pay.alipay'), $config));
        });
        $this->app->singleton('pay.wechat', function ($app, array $config = []) {
            return Pay::wechat(array_merge(config('pay.wechat'), $config));
        });
    }

    /**
     * Get services.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return array
     */
    public function provides()
    {
        return ['pay.alipay', 'pay.wechat'];
    }
}
