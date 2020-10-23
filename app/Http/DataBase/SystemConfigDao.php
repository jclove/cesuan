<?php

namespace App\Http\DataBase;

class SystemConfigDao
{
    /**
     * @param $type
     * @param array $data
     * @return mixed
     */
    public function updateOrCreate(array $data = [])
    {
        return app('SystemConfigModel')->updateOrCreate([
            'type' => 'cesuan'
        ], $data);
    }

    /**
     * @param $type
     * @return mixed
     */
    public function show()
    {
        return app('SystemConfigModel')->first();
    }
}