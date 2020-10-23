<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * @var string
     */
    private $namespace = 'App\Model';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WechatUserModel', $this->namespace . '\WechatUser');
        $this->app->bind('AdminUserModel', $this->namespace . '\AdminUser');
        $this->app->bind('OrderModel', $this->namespace . '\Order');
        $this->app->bind('ProductModel', $this->namespace . '\Product');
        $this->app->bind('ProductClassModel', $this->namespace . '\ProductClass');
        $this->app->bind('ResourceModel', $this->namespace . '\Resource');
        $this->app->bind('HotModel', $this->namespace . '\Hot');
        $this->app->bind('AgentRelationModel', $this->namespace . '\AgentRelation');
        $this->app->bind('CashLogModel', $this->namespace . '\CashLog');
        $this->app->bind('CommissionLogModel', $this->namespace . '\CommissionLog');
        $this->app->bind('UserInfoModel', $this->namespace . '\UserInfo');
        $this->app->bind('SystemConfigModel', $this->namespace . '\SystemConfig');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'WechatUserModel',
            'AdminUserModel',
            'OrderModel',
            'ProductModel',
            'ProductClassModel',
            'ResourceModel',
            'HotModel',
            'AgentRelationModel',
            'CashLogModel',
            'CommissionLogModel',
            'UserInfoModel',
            'SystemConfigModel',
        ];
    }
}
