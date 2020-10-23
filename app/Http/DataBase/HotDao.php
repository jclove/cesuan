<?php

namespace App\Http\DataBase;

class HotDao
{
    /**
     * @return mixed
     */
    public function index(array $condition = [])
    {
        $builder = app('HotModel')->select(['*']);

        $builder->with([
            'product' => function ($query) {
                $query->select(['id', 'name', 'identity', 'alias']);
            }
        ]);

        $builder->orderBy('sort', 'DESC');
        $builder->orderBy('id', 'DESC');

        // 数量
        if (!empty($condition['pageSize'])){
            return $builder->paginate($condition['pageSize']);
        }
        return $builder->get();
    }

    /**
     * @param int $id
     * @param array $update_data
     */
    public function update($id = 0, array $update_data = [])
    {
        return app('HotModel')->where('id', $id)->updaet($update_data);
    }

    /**
     * @param int $id
     */
    public function show($id = 0)
    {
        $builder = app('HotModel')->select(['*']);

        $builder->with([
            'product' => function ($query) {
                $query->select(['id', 'name']);
            }
        ]);

        return $builder->where('id', $id)->first();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function createOrUpdate(array $data  = [])
    {
        return app('HotModel')->updateOrCreate([
            'product_id' => $data['product_id']
        ], $data);
    }
}