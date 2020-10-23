<?php

namespace App\Http\Business;

use App\Http\DataBase\AgentRelationDao;
use App\Http\DataBase\UserInfoDao;

class AgentRelationBusiness
{
    /**
     * AgentRelationBusiness constructor.
     * @param AgentRelationDao $dao
     */
    public function __construct(AgentRelationDao $dao, UserInfoDao $user_info_dao)
    {
        $this->dao = $dao;
        $this->user_info_dao = $user_info_dao;
    }


    /**
     * @param int $wechat_user_id
     * @param int $share_wechat_user_id
     */
    public function relation($wechat_user_id = 0, $share_wechat_user_id = 0)
    {
        for ($i = 1; $i <= 3; $i++) {
            $exist = $this->dao->exist($wechat_user_id, $share_wechat_user_id);
            if ($exist) {
                return false;
            }
            $exist = $this->dao->getPid($wechat_user_id, $i);
            if (!empty($exist)) {
                return false;
            }
            $this->dao->store([
                'pid' => $share_wechat_user_id,
                'wechat_user_id' => $wechat_user_id,
                'level' => $i
            ]);
            $pid_info = $this->dao->getPid($share_wechat_user_id, 1);
            if (empty($pid_info)) {
                break;
            }
            $share_wechat_user_id = $pid_info->pid;
        }
    }

    /**
     * @param int $wechat_user_id
     * @param int $level
     * @return mixed
     */
    public function show($wechat_user_id = 0, $level = 1)
    {
        return $this->dao->show($wechat_user_id, $level);
    }

    /**
     * @param int $wechat_user_id
     * @return mixed
     */
    public function countLevel($wechat_user_id = 0, $level = 1)
    {
        return $this->dao->countLevel($wechat_user_id, $level);
    }

    /**
     * @param int $wechat_user_id
     * @param int $level
     * @return mixed
     */
    public function index($wechat_user_id = 0, $level = 1)
    {
        return $this->dao->index($wechat_user_id, $level);
    }

    /**
     * @param int $wechat_user_id
     */
    public function gameOrderByCommission($wechat_user_id = 0, $level = 1, $page_size = 20)
    {
        $wechat_user_ids = $this->dao->gameOrderByCommission($wechat_user_id, $level);
        return $this->user_info_dao->gameOrderByCommission([
            'wechat_user_ids' => $wechat_user_ids,
            'page_size' => $page_size
        ]);
    }
}