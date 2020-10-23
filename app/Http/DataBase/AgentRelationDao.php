<?php

namespace App\Http\DataBase;


class AgentRelationDao
{
    /**
     * @param int $wechat_user_id
     * @param int $level
     * @return mixed
     */
    public function countLevel($wechat_user_id = 0, $level = 1)
    {
        return app('AgentRelationModel')->where('pid', $wechat_user_id)->where('level', $level)->count();
    }

    /**
     * @param int $wechat_user_id
     * @param int $level
     * @return mixed
     */
    public function index($wechat_user_id = 0, $level = 1)
    {
        $builder = app('AgentRelationModel')->select(['*']);
        $builder->where('pid', $wechat_user_id);
        $builder->where('level', $level);

        $builder->with([
            'wechatUser' => function ($query) {
                $query->select(['id', 'nickname', 'headimgurl']);
            }
        ]);

        $builder->orderBy('id', 'DESC');

        return $builder->paginate(20);
    }

    /**
     * @param int $wechat_user_id
     * @param int $share_wechat_user_id
     * @param int $level
     */
    public function updataOrCreate($wechat_user_id = 0, $share_wechat_user_id = 0, $level = 1)
    {
        return app('AgentRelationModel')->updateOrCreate([
            'pid' => $share_wechat_user_id,
            'wechat_user_id' => $wechat_user_id,
            'level' => $level,
        ], [
            'pid' => $share_wechat_user_id,
            'wechat_user_id' => $wechat_user_id,
            'level' => $level,
        ]);
    }

    /**
     * @param array $store_data
     */
    public function store(array $store_data = [])
    {
        return app('AgentRelationModel')->create($store_data);
    }

    /**
     * @param int $share_wechat_user_id
     * @return mixed
     */
    public function getPid($share_wechat_user_id = 0, $level = 1)
    {
        return app('AgentRelationModel')->where('wechat_user_id', $share_wechat_user_id)->where('level', $level)->first();
    }

    /**
     * @param int $wechat_user_id
     * @param int $share_wechat_user_id
     * @return bool
     */
    public function exist($wechat_user_id = 0, $share_wechat_user_id = 0)
    {
        $model = app('AgentRelationModel');
        $count = $model->where('wechat_user_id', $wechat_user_id)->where('pid', $share_wechat_user_id)->count();
        if ($count) {
            return true;
        }
        $count = $model->where('pid', $wechat_user_id)->where('wechat_user_id', $share_wechat_user_id)->count();
        if ($count) {
            return true;
        }
        return false;
    }

    /**
     * @param int $wechat_user_id
     * @param int $level
     */
    public function show($wechat_user_id = 0, $level = 1)
    {
        return app('AgentRelationModel')
            ->where('wechat_user_id', $wechat_user_id)
            ->where('level', $level)->first();
    }

    /**
     * @param int $wechat_user_id
     * @param int $level
     * @return mixed
     */
    public function gameOrderByCommission($wechat_user_id = 0, $level = 1)
    {
        return app('AgentRelationModel')->where('pid', $wechat_user_id)->where('level', $level)->pluck('wechat_user_id');
    }
}