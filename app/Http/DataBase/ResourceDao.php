<?php

namespace App\Http\DataBase;

class ResourceDao
{
    /**
     * @param array $condition
     */
    public function index(array $condition = [])
    {
        $builder = app('ResourceModel')->select(['*']);

        $builder->with([
            'product' => function ($query) {
                $query->select(['id', 'name']);
            }
        ]);

        $builder->with([
            'order' => function ($query) {
                $query->select(['id', 'pay_status']);
            }
        ]);

        $builder->orderBy('id', 'DESC');

        if (isset($condition['all']) && $condition['all'] == true){
            return $builder->get();
        }
        // 返回分页形式
        return $builder->paginate(20);
    }

    /**
     * @param array $store_data
     */
    public function store(array $store_data = [])
    {
        return app('ResourceModel')->create($store_data);
    }

    /**
     * @return mixed
     */
    public function total()
    {
        return app('ResourceModel')->count();
    }
}