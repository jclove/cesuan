<?php

namespace App\Http\DataBase;

class SiteInfoDao
{
    /**
     * @return mixed
     */
    public function index()
    {
        return app('SiteInfoModel')->select(['*'])->get();
    }

    /**
     * @param array $update
     */
    public function update(array $update = [])
    {

    }
}