<?php

namespace App\Http\Business;

use App\Http\DataBase\SystemConfigDao;

class SystemConfigBusiness
{

    /**
     * SystemConfigBusiness constructor.
     * @param SystemConfigDao $dao
     */
    public function __construct(SystemConfigDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param $type
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function updateOrCreate(array $data = [])
    {
        return $this->dao->updateOrCreate($data);
    }

    /**
     * @param $type
     * @return mixed
     */
    public function show()
    {
        return $this->dao->show();
    }
}