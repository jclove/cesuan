<?php

namespace App\Http\DataBase;


class ProductClassDao
{

    /**
     * @return mixed
     */
    public function index(array $condition = [])
    {
        $builder = app('ProductClassModel')->select(['*']);

        if (!empty($condition['status'])){
            $builder->where('status', $condition['status']);
        }

        $builder->orderBy('sort', 'desc');
        $builder->orderBy('id', 'asc');

        return $builder->get();
    }

    /**
     * @param string $name
     */
    public function isExistName(string $name = '')
    {
        return app('ProductClassModel')->where('name', $name)->count();
    }

    /**
     * @param array $store_data
     * @return mixed
     */
    public function store(array $store_data)
    {
        return app('ProductClassModel')->create($store_data);
    }

    /**
     * @param int $id
     * @param array $update_data
     * @return mixed
     */
    public function update($id = 0, array $update_data = [])
    {
        return app('ProductClassModel')->where('id', $id)->update($update_data);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show($id = 0)
    {
        return app('ProductClassModel')->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy($id = 0)
    {
        return app('ProductClassModel')->where('id', $id)->delete();
    }
}