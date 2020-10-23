<?php

namespace App\Http\Business;

use App\Http\DataBase\HotDao;

class HotBusiness
{
    /**
     * HotBusiness constructor.
     * @param HotDao $dao
     */
    public function __construct(HotDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return mixed
     */
    public function index(array $condition = [])
    {
        return $this->dao->index($condition);
    }

    /**
     * @param int $id
     * @param array $update_data
     */
    public function update($id = 0, $update_data = [])
    {
        return $this->dao->update($id, $update_data);
    }

    /**
     * @param int $id
     */
    public function show($id = 0)
    {
        return $this->dao->show($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createOrUpdate(array $data = [])
    {
        return $this->dao->createOrUpdate($data);
    }
}