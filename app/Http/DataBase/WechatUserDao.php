<?php

namespace App\Http\DataBase;

class WechatUserDao
{

    /**
     * @param array $condition
     */
    public function index(array $condition = [])
    {
        $builder = app('WechatUserModel')->select(['*']);

        $builder->orderBy('id', 'DESC');

        if (isset($condition['all']) && $condition['all'] == true){
            return $builder->get();
        }
        // 返回分页形式
        return $builder->paginate(20);
    }

    /**
     * @param array $wechat_user_info
     * @return mixed
     */
    public function updateOrCreate(array $wechat_user_info = [])
    {
        return app('WechatUserModel')->updateOrCreate([
            'openid' => $wechat_user_info['openid']
        ], $wechat_user_info);
    }

    /**
     * @param int $uuid
     * @return mixed
     */
    public function getUUid($uuid = 0)
    {
        return app('WechatUserModel')->where('uuid', $uuid)->first();
    }

    /**
     * 获取用户信息
     * @param int $id
     * @return mixed
     */
    public function show($id = 0){
        return app('WechatUserModel')->where('id', $id)->first();
    }

}