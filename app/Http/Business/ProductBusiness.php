<?php

namespace App\Http\Business;

use App\Http\DataBase\ProductDao;

class ProductBusiness
{
    /**
     * ProductBusiness constructor.
     * @param ProductDao $dao
     */
    public function __construct(ProductDao $dao)
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
     * @param array $store_data
     */
    public function store(array $store_data = [])
    {
        if (empty($store_data)){
            return false;
        }
        return $this->dao->store($store_data);
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
     * @param array $update_data
     */
    public function update($id = 0, array $update_data = [])
    {
        if (empty($id) || empty($update_data)){
            return false;
        }
        return $this->dao->update($id, $update_data);
    }

    /**
     * @param string $identity
     */
    public function isExist(string $identity = '')
    {
        return $this->dao->isExist($identity);
    }
}