<?php

namespace App\Http\Business;


use App\Http\DataBase\ProductClassDao;

class ProductClassBusiness
{
    /**
     * ProductClassBusiness constructor.
     * @param ProductClassDao $dao
     */
    public function __construct(ProductClassDao $dao)
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
     * @param string $name
     * @return mixed
     */
    public function isExistName(string $name = '')
    {
        return $this->dao->isExistName($name);
    }

    /**
     * @param array $store_data
     */
    public function store(array $store_data = [])
    {
        if (empty($store_data)) {
            return false;
        }
        return $this->dao->store($store_data);
    }

    /**
     * @param int $id
     * @param array $update_data
     */
    public function update($id = 0, array $update_data = [])
    {
        if (empty($id) || empty($update_data)) {
            return false;
        }
        return $this->dao->update($id, $update_data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show($id = 0)
    {
        return $this->dao->show($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy($id = 0)
    {
        if (empty($id)) {
            return false;
        }
        return $this->dao->destroy($id);
    }
}