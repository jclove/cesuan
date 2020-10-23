<?php

namespace App\Http\Business;


use App\Http\DataBase\ResourceDao;

class ResourceBusiness
{
    /**
     * ResourceBusiness constructor.
     * @param ResourceDao $dao
     */
    public function __construct(ResourceDao $dao)
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
     */
    public function store(array $store_data = [])
    {
        return $this->dao->store($store_data);
    }

    /**
     * @return mixed
     */
    public function total()
    {
        return $this->dao->total();
    }
}