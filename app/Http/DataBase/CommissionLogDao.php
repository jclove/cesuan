<?php

namespace App\Http\DataBase;

class CommissionLogDao
{
    /**
     * @param array $condition
     */
    public function index(array $condition = [])
    {
        $builder = app('CommissionLogModel')->select(['*']);

        // 用户
        if (!empty($condition['wechat_user_id'])) {
            $builder->where('wechat_user_id', $condition['wechat_user_id']);

        }

        /**
         *
         */
        if (isset($condition['myWechatUser'])) {
            // 关联用户
            $builder->with([
                'myWechatUser' => function ($query) {
                    $query->select(['id', 'nickname', 'headimgurl']);
                }
            ]);
        }
        // 关联购买者
        $builder->with([
            'wechatUser' => function ($query) {
                $query->select(['id', 'nickname', 'headimgurl']);
            }
        ]);

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
     */
    public function store(array $store_data = [])
    {
        return app('CommissionLogModel')->create($store_data);
    }

    /**
     * @param int $order_id
     * @param int $wechat_user_id
     * @return mixed
     */
    public function isExist($order_id = 0, $wechat_user_id = 0)
    {
        return app('CommissionLogModel')
            ->where('order_id', $order_id)
            ->where('wechat_user_id', $wechat_user_id)->count();
    }

    /**
     * @return mixed
     */
    public function total()
    {
        return app('CommissionLogModel')->count();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function totalTee()
    {
        return app('CommissionLogModel')->sum('finally');
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function dayTotal()
    {
        $start_time = date('Y-m-d 00:00:00');
        $end_time = date('Y-m-d 23:59:59');
        return app('CommissionLogModel')->whereBetween('created_at', [$start_time, $end_time])->count();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function daytotalTee()
    {
        $start_time = date('Y-m-d 00:00:00');
        $end_time = date('Y-m-d 23:59:59');
        return app('CommissionLogModel')->whereBetween('created_at', [$start_time, $end_time])->sum('finally');
    }
}