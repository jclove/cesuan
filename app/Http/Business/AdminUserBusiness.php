<?php

namespace App\Http\Business;

use App\Http\DataBase\AdminUserDao;

class AdminUserBusiness
{
    /**
     * AdminUserBusiness constructor.
     * @param AdminUserDao $dao
     */
    public function __construct(AdminUserDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * 更新
     * @param int $id
     * @param array $update_data
     * @return mixed
     */
    public function update($id = 0, $update_data = []){
        return $this->dao->update($id, $update_data);
    }
}