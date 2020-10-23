<?php

namespace App\Http\Business;

use App\Http\DataBase\SiteInfoDao;

class SiteInfoBusiness
{
    /**
     * SiteInfoBusiness constructor.
     * @param SiteInfoDao $dao
     */
    public function __construct(SiteInfoDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $list = $this->dao->index();
        if ($list->isEmpty()) {
            return [];
        }
        $array = [];
        foreach ($list as $item) {
            $array[$item->key] = $item->value;
        }
        return $array;
    }
}