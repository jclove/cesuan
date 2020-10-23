<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class JsonException extends Exception
{
    /**
     * @var int|string
     */
    private $error_code = 10000;

    /**
     * @var array|int
     */
    private $data = [];

    /**
     * 错误代码列表
     * @var array
     */
    private $code_list = [
        10000 => '参数错误',

        20001 => '保存订单失败',

        30001 => '提现金额不正确',
        30002 => '提现金额0.3元起',
        30003 => '每天只能提现一次',
    ];

    public function __construct($error_code = 10000, array $data = [])
    {
        $this->error_code = $error_code;
        $this->data = $data;
    }

    /**
     * 获取错误信息
     * @return array
     */
    public function getErrorMsg()
    {
        $error_code = isset($this->code_list[$this->error_code]) ? $this->error_code : 10000;

        return [
            'error_code' => $error_code,
            'error_msg'  => $this->code_list[$error_code],
            'body_data'  => $this->data
        ];
    }
}
