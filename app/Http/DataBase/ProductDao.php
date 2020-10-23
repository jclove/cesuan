<?php

namespace App\Http\DataBase;

class ProductDao
{

    /**
     * @return mixed
     */
    public function index(array $condition = [])
    {
        $builder = app('ProductModel')->select(['*']);

        // 分类
        if (!empty($condition['pid'])) {
            $builder->where('pid', $condition['pid']);
        }

        // 状态
        if (!empty($condition['status'])){
            $builder->where('status', $condition['status']);
        }

        if (isset($condition['isHot']) && $condition['isHot']){
            $builder->with([
                'hot' => function ($query) {
                    $query->select(['id', 'product_id','status']);
                }
            ]);
        }

        $builder->orderBy('sort', 'desc');
        $builder->orderBy('id', 'asc');
        return $builder->get();
    }

    /**
     * @param array $store_data
     */
    public function store(array $store_data = [])
    {
        try {
            return app('ProductModel')->create($store_data);
        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * @param int $id
     */
    public function show($id = 0)
    {
        return app('ProductModel')->find($id);
    }

    /**
     * @param int $id
     * @param array $update_data
     */
    public function update($id = 0, array $update_data = [])
    {
        return app('ProductModel')->where('id', $id)->update($update_data);
    }

    /**
     * @param string $identity
     */
    public function isExist(string $identity = '')
    {
        return app('ProductModel')->where('identity', $identity)->count();
    }

}