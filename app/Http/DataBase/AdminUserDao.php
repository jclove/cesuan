<?php

namespace App\Http\DataBase;

class AdminUserDao
{
    /**
     * 更新密码
     * @param int $id
     * @param array $update_data
     * @return mixed
     */
    public function update($id = 0, $update_data = []){
        return app('AdminUserModel')->where('id', $id)->update($update_data);
    }
}