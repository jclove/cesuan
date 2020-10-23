<?php

namespace App\Http\Business;

use App\Http\DataBase\CommissionLogDao;

class CommissionLogBusiness
{
    /**
     * CommissionLogBusiness constructor.
     * @param CommissionLogDao $dao
     */
    public function __construct(CommissionLogDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param array $condition
     */
    public function index(array $condition = [])
    {
        return $this->dao->index($condition);
    }

    /**
     * @param array $store_data
     * @return mixed
     */
    public function store(array $store_data = [])
    {
        return $this->dao->store($store_data);
    }

    /**
     * @param int $order_id
     * @param int $wechat_user_id
     * @return mixed
     */
    public function isExist($order_id = 0, $wechat_user_id = 0)
    {
        return $this->dao->isExist($order_id, $wechat_user_id);
    }

    /**
     * @return mixed
     */
    public function total()
    {
        return $this->dao->total();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function totalTee()
    {
        return $this->dao->totalTee();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function dayTotal()
    {
        return $this->dao->dayTotal();
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function daytotalTee()
    {
        return $this->dao->daytotalTee();
    }
}