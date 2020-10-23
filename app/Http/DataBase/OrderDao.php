<?php

namespace App\Http\DataBase;

use App\Exceptions\JsonException;
use Illuminate\Support\Facades\DB;

class OrderDao
{

    /**
     * @param array $condition
     * @return mixed
     */
    public function index(array $condition = [])
    {
        $builder = app('OrderModel')->select(['*']);

        // 订单编号
        if (!empty($condition['out_trade_no'])){
            $builder->where('out_trade_no', $condition['out_trade_no']);
        }

        // 支付状态
        if (!empty($condition['pay_status'])) {
            $builder->where('pay_status', $condition['pay_status']);
        }

        // 支付类型
        if (!empty($condition['pay_type'])) {
            $builder->where('pay_type', $condition['pay_type']);
        }

        // 微信用户
        if (!empty($condition['wechat_user_id'])){
            $builder->where('wechat_user_id', $condition['wechat_user_id']);
        }

        $builder->with([
            'product' => function ($query) {
                $query->select(['id', 'name']);
            }
        ]);

        $builder->orderBy('id', 'DESC');

        if (isset($condition['all']) && $condition['all'] == true){
            return $builder->get();
        }
        // 返回分页形式
        return $builder->paginate(20);
    }

    /**
     * @param array $store_data
     * @throws JsonException
     */
    public function store(array $store_data = [])
    {
        try {
            return app('OrderModel')->create($store_data);
        } catch (\Exception $exception) {
            throw new JsonException(20001);
        }
    }

    /**
     * @param int $order_id
     */
    public function show($order_id = 0)
    {
        return app('OrderModel')->find($order_id);
    }

    /**
     * @param int $wechat_user_id
     * @param int $order_id
     * @return mixed
     */
    public function getUserOrder($wechat_user_id = 0, $order_id = 0)
    {
        return app('OrderModel')->where('id', $order_id)->where('wechat_user_id', $wechat_user_id)->first();
    }

    /**
     * @param int $order_id
     * @param array $update_data
     * @return mixed
     */
    public function update($order_id = 0, array $update_data = [])
    {
        return app('OrderModel')->where('id', $order_id)->update($update_data);
    }

    /**
     * @param string $out_trade_no
     */
    public function showOutTradeNo($out_trade_no = '')
    {
        return app('OrderModel')->where('out_trade_no', $out_trade_no)->first();
    }

    /**
     * @return mixed
     */
    public function groupPayStauts()
    {
        $builder = app('OrderModel')->select(DB::raw('count(pay_status) as total, sum(total_fee) as total_price, pay_status'));
        return $builder->groupBy('pay_status')->get();
    }

    /**
     * @return mixed
     */
    public function groupPayType()
    {
        $builder = app('OrderModel')->select(DB::raw('count(pay_status) as pay_status_total,count(pay_type) as pay_type_total, pay_status, pay_type'));
        return $builder->groupBy('pay_type')->groupBy('pay_status')->get();
    }

    /**
     * @return mixed
     */
    public function groupDay()
    {
        $builder = app('OrderModel')->select(DB::raw('DATE_FORMAT(`created_at`, "%Y%m%d") as day,count(*) as day_total, sum(total_fee) as total_price, count(pay_status) as pay_status_total,pay_status'));
        return $builder->groupBy('day')->groupBy('pay_status')->orderBy('day',' desc')->offset(0)->limit(10)->get(10);
    }

    /**
     * @param int $wechat_user_id
     */
    public function count($wechat_user_id = 0)
    {
        return app('OrderModel')->where('wechat_user_id', $wechat_user_id)->where('pay_status', 'yes')->count();
    }
}