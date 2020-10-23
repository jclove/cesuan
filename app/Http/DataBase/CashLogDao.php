<?php

namespace App\Http\DataBase;


use App\Exceptions\JsonException;

class CashLogDao
{
    /**
     * @param array $condition
     * @return mixed
     */
    public function index(array $condition = [])
    {
        $builder = app('CashLogModel')->select(['*']);

        // 用户
        if (!empty($condition['wechat_user_id'])){
            $builder->where('wechat_user_id', $condition['wechat_user_id']);
        }

        // 支付状态
        if (isset($condition['pay_status'])){
            $builder->where('pay_status', $condition['pay_status']);
        }

        // 关联
        if (isset($condition['realationWechatUser'])){
            $builder->with([
                'wechatUser' => function ($query) {
                    $query->select(['id', 'nickname', 'headimgurl']);
                }
            ]);
        }

        $builder->orderBy('id', 'DESC');

        // 判断是取出所有数据还是分页形式
        if (isset($condition['all']) && $condition['all'] == true) {
            return $builder->get();
        }

        $page_size = isset($condition['page_size']) && is_numeric($condition['page_size']) ? abs($condition['page_size']) : 20;
        return $builder->paginate($page_size);
    }

    /**
     * @param array $store_data
     * @return mixed
     * @throws JsonException
     */
    public function store(array $store_data = [])
    {
        return app('CashLogModel')->create($store_data);
    }

    /**
     * @param int $id
     * @param array $update_data
     */
    public function update($id = 0, array $update_data = [])
    {
        return app('CashLogModel')->where('id', $id)->update($update_data);
    }

    /**
     * @param int $wechat_user_id
     * @param string $type
     * @return mixed
     */
    public function totalCash($wechat_user_id = 0)
    {
        return app('CashLogModel')
            ->where('wechat_user_id', $wechat_user_id)
            ->where('pay_status', 'yes')->sum('total_fee');
    }

    /**
     * @param int $wechat_user_id
     * @param string $type
     */
    public function dayCash($wechat_user_id = 0)
    {
        $start_time = date('Ymd000000');
        $end_time = date('Ymd235959');
        return app('CashLogModel')
            ->where('wechat_user_id', $wechat_user_id)
            ->where('pay_status', 'yes')
            ->whereBetween('pay_time',[$start_time, $end_time])->count();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function total()
    {
        return app('CashLogModel')->where('pay_status', 'yes')->count();
    }

    /**
     * @return mixed
     */
    public function totalSum()
    {
        return app('CashLogModel')->where('pay_status', 'yes')->sum('total_fee');
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function dayTotalSum()
    {
        $start_time = date('Ymd000000');
        $end_time = date('Ymd235959');
        return app('CashLogModel')
            ->where('pay_status', 'yes')
            ->whereBetween('pay_time',[$start_time, $end_time])->sum('total_fee');
    }
}