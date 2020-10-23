<?php

namespace App\Http\Business;


use App\Http\DataBase\CashLogDao;

class CashLogBusiness
{
    /**
     * CashLogBusiness constructor.
     * @param CashLogDao $dao
     */
    public function __construct(CashLogDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param array $condition
     * @return mixed
     */
    public function index(array $condition = [])
    {
        return $this->dao->index($condition);
    }

    /**
     * @param array $store_data
     * @throws \App\Exceptions\JsonException
     */
    public function store(array $store_data = [])
    {
        return $this->dao->store($store_data);
    }

    /**
     * @param int $id
     * @param array $update_data
     * @return mixed
     */
    public function update($id = 0, array $update_data = [])
    {
        return $this->dao->update($id, $update_data);
    }

    /**
     * @param int $wechat_user_id
     */
    public function totalCash($wechat_user_id = 0)
    {
        return $this->dao->totalCash($wechat_user_id);
    }

    /**
     * @param int $wechat_user_id
     * @param string $type
     * @return mixed
     */
    public function dayCash($wechat_user_id = 0)
    {
        return $this->dao->dayCash($wechat_user_id);
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
    public function totalSum()
    {
        return $this->dao->totalSum();
    }

    /**
     * @param string $type
     */
    public function dayTotalSum()
    {
        return $this->dao->dayTotalSum();
    }
}