<?php

namespace App\Http\Business;

use App\Exceptions\JsonException;
use App\Http\DataBase\OrderDao;

class OrderBusiness
{
    /**
     * OrderBusiness constructor.
     * @param OrderDao $dao
     */
    public function __construct(OrderDao $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param array $condition
     */
    public function index(array $condition = [])
    {
        return $this->dao->index($condition);
    }

    /**
     * @param array $store_data
     * @throws JsonException
     */
    public function store(array $store_data = [])
    {
        if (empty($store_data['product_id'])) {
            throw new JsonException(10000);
        }
        return $this->dao->store($store_data);
    }

    /**
     * @param int $order_id
     */
    public function show($order_id = 0)
    {
        return $this->dao->show($order_id);
    }

    /**
     * @param int $wechat_user_id
     * @param int $order_id
     */
    public function getUserOrder($wechat_user_id = 0, $order_id = 0)
    {
        return $this->dao->getUserOrder($wechat_user_id, $order_id);
    }

    /**
     * @param int $order_id
     * @param array $update_data
     * @return mixed
     */
    public function update($order_id = 0, array $update_data = [])
    {
        return $this->dao->update($order_id, $update_data);
    }

    /**
     * @param string $out_trade_no
     */
    public function showOutTradeNo($out_trade_no = '')
    {
        return $this->dao->showOutTradeNo($out_trade_no);
    }

    /**
     * @return array
     */
    public function groupPayStauts()
    {
        $list = $this->dao->groupPayStauts();
        if ($list->isEmpty()) {
            return [];
        }
        $array_data = [];
        $total = 0;
        $total_no = 0;
        $total_yes = 0;
        foreach ($list as $item) {
            $total += $item['total'];
            $array_data[$item['pay_status']] = $item['total'];
            if ($item['pay_status'] == 'yes'){
                $total_yes += $item['total_price'];
            }
            if ($item['pay_status'] == 'no'){
                $total_no += $item['total_price'];
            }
        }
        $array_data['total'] = $total;
        $array_data['total_yes'] = $total_yes;
        $array_data['total_no'] = $total_no;
        return $array_data;
    }

    /**
     * @return array
     */
    public function groupPayType()
    {
        $list = $this->dao->groupPayType();
        if ($list->isEmpty()) {
            return [];
        }
        $array_data = [];
        foreach ($list as $item){
            if (isset($array_data[$item->pay_type][$item->pay_status])){
                $array_data[$item->pay_type][$item->pay_status]+= $item->pay_status_total;
            }else{
                $array_data[$item->pay_type][$item->pay_status] = $item->pay_status_total;
            }
        }
        return $array_data;
    }

    /**
     * @return array
     */
    public function groupDay()
    {
        $list = $this->dao->groupDay();
        if ($list->isEmpty()) {
            return [];
        }
        $array_data = [];
        foreach ($list as $item) {
            if (isset($array_data[$item->day][$item->pay_status])) {
                $array_data[$item->day][$item->pay_status]+= $item->pay_status_total;
            }else{
                $array_data[$item->day][$item->pay_status] = $item->pay_status_total;
            }
            if (isset($array_data[$item->day]['day_total'])) {
                $array_data[$item->day]['day_total'] += $item->day_total;
            }else{
                $array_data[$item->day]['day_total'] = $item->day_total;
            }
            if (isset($array_data[$item->day]['total_no']) && $item->pay_status == 'no') {
                $array_data[$item->day]['total_no'] += $item->total_price;
            }else{
                if ($item->pay_status == 'no'){
                    $array_data[$item->day]['total_no'] = $item->total_price;
                }
            }
            if (isset($array_data[$item->day]['total_yes']) && $item->pay_status == 'yes') {
                $array_data[$item->day]['total_yes'] += $item->total_price;
            }else{
                if ($item->pay_status == 'yes'){
                    $array_data[$item->day]['total_yes'] = $item->total_price;
                }
            }
        }
        return $array_data;
    }

    /**
     * @param int $wechat_user_id
     */
    public function count($wechat_user_id = 0)
    {
        return $this->dao->count($wechat_user_id);
    }
}