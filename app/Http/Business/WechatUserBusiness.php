<?php

namespace App\Http\Business;

use App\Http\DataBase\UserInfoDao;
use App\Http\DataBase\WechatUserDao;

class WechatUserBusiness
{
    /**
     * WechatUserBusiness constructor.
     * @param WechatUserDao $dao
     */
    public function __construct(WechatUserDao $dao, UserInfoDao $user_info_dao)
    {
        $this->dao = $dao;
        $this->user_info_dao = $user_info_dao;
    }

    /**
     * @param array $condition
     */
    public function index(array $condition = [])
    {
        return $this->dao->index($condition);
    }


    /**
     * @param array $wechat_user_info
     * @return mixed
     */
    public function updateOrCreate(array $wechat_user_info = [])
    {
        $wechat_user_info = $this->dao->updateOrCreate($wechat_user_info);
        $this->user_info_dao->updateOrCreate([
            'wechat_user_id' => $wechat_user_info->id
        ]);
        return $wechat_user_info;
    }

    /**
     * @param int $uuid
     * @return mixed
     */
    public function getUUid($uuid = 0)
    {
        return $this->dao->getUUid($uuid);
    }

    /**
     * 获取用户详情
     * @param int $id
     * @return mixed
     */
    public function show($id = 0){
        return $this->dao->show($id);
    }
}