<?php

namespace App\Http\DataBase;

class UserInfoDao
{
    /**
     * @param int $wechat_user_id
     */
    public function show($wechat_user_id = 0)
    {
        return app('UserInfoModel')->where('wechat_user_id', $wechat_user_id)->first();
    }

    /**
     * @param array $wechat_user_info
     * @return mixed
     */
    public function updateOrCreate(array $wechat_user_info = [])
    {
        return app('UserInfoModel')->updateOrCreate([
            'wechat_user_id' => $wechat_user_info['wechat_user_id']
        ], $wechat_user_info);
    }

    /**
     * @param int $wechat_user_id
     * @param array $update_data
     * @return mixed
     */
    public function update($wechat_user_id = 0, array $update_data = [])
    {
        return app('UserInfoModel')->where('wechat_user_id', $wechat_user_id)->update($update_data);
    }

    /**
     * 游戏总佣金排序
     * @param array $condition
     * @return mixed
     */
    public function gameOrderByCommission(array $condition = [])
    {
        $builder = app('UserInfoModel')->select(['wechat_user_id', 'total_commission']);

        // 用户Ids
        if (isset($condition['wechat_user_ids'])) {
            $builder->whereIn('wechat_user_id', $condition['wechat_user_ids']);
        }

        $builder->with([
            'wechatUser' => function ($query) {
                $query->select(['id', 'nickname', 'headimgurl']);
            }
        ]);

        $builder->orderBy('total_commission', 'DESC');
        $builder->orderBy('wechat_user_id', 'DESC');

        $page_size = isset($condition['page_size']) && is_numeric($condition['page_size']) ? abs($condition['page_size']) : 20;
        return $builder->paginate($page_size);
    }

    /**
     * @param int $wechat_user_id
     * @param int $total_fee
     * @param string $field
     * @return mixed
     */
    public function updateCommission($wechat_user_id = 0, $total_fee = 0)
    {
        return app('UserInfoModel')
            ->where('wechat_user_id', $wechat_user_id)
            ->where('commission', '>=', $total_fee)->decrement('commission', $total_fee);
    }
}