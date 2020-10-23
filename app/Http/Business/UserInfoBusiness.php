<?php

namespace App\Http\Business;

use App\Http\DataBase\UserInfoDao;

class UserInfoBusiness
{
    /**
     * UserInfoBusiness constructor.
     * @param UserInfoDao $dao
     */
    public function __construct(UserInfoDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param int $wechat_user_id
     * @return mixed
     */
    public function show($wechat_user_id = 0)
    {
        return $this->dao->show($wechat_user_id);
    }

    /**
     * @param array $wechat_user_info
     */
    public function updateOrCreate(array $wechat_user_info = [])
    {
        return $this->dao->updateOrCreate($wechat_user_info);
    }

    /**
     * @param int $wechat_user_id
     * @param array $update_data
     * @return bool
     */
    public function update($wechat_user_id = 0, array $update_data = [])
    {
        if (empty($wechat_user_id) || empty($update_data)) {
            return false;
        }
        return $this->dao->update($wechat_user_id, $update_data);
    }

    /**
     * @param int $page_size
     * @return mixed
     */
    public function gameOrderByCommission($page_size = 20)
    {
        return $this->dao->gameOrderByCommission([
            'page_size' => $page_size
        ]);
    }

    /**
     * @param int $wechat_user_id
     * @param int $total_fee
     * @param string $field
     */
    public function updateCommission($wechat_user_id = 0, $total_fee = 0)
    {
        return $this->dao->updateCommission($wechat_user_id, $total_fee);
    }
}