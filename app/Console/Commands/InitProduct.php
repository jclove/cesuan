<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化产品数据';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $product_class_business = app('\App\Http\Business\ProductClassBusiness');
        $product_business = app('\App\Http\Business\ProductBusiness');
        $price = floatval(98);
        $product_array = [
            '恋爱婚姻' => [
                'loveAstrolabe' => [
                    'name' => '八字姻缘',
                    'alias' => '八字姻缘',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '八字解姻缘，找到命中的另外一半'
                ],
                'lover' => [
                    'name' => '算算另一半',
                    'alias' => '算算另一半',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => 'TA在哪，如何邂逅你的白马王子/白雪姑娘'
                ],
                'flower' => [
                    'name' => '2019桃花运势',
                    'alias' => '桃花运势',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '把握命中好姻缘，你何时会结婚'
                ],
                'lifeFate' => [
                    'name' => '命中结婚运',
                    'alias' => '何时结婚',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '把握命中好姻缘，你何时会结婚'
                ],
                'foreseeMarriage' => [
                    'name' => '婚后感情详批',
                    'alias' => '婚后感情',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '预知婚后生活和感情，能否携手一生'
                ],

                'loveElegant' => [
                    'name' => '本月感情运势',
                    'alias' => '感情运势',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '揭示本月桃花状况与危机'
                ],

                'lookYourlover' => [
                    'name' => '透析你的恋人',
                    'alias' => '透析恋人',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '透视另一半，知晓恋人全部内心'
                ],
                'loveClairvoyance' => [
                    'name' => 'TA是否真爱你',
                    'alias' => '是否爱你',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '剖析另一半，婚前婚后是否真爱你'
                ],
                'loveLucky' => [
                    'name' => '双人恋情诊断书',
                    'alias' => '恋情诊断书',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '诊断你们的恋情状况，让爱情保鲜、牵手一生'
                ],
                'precisionMatch' => [
                    'name' => '如何追到TA',
                    'alias' => '如何追到TA',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '如何追求另一半、为你送上锦囊妙计'
                ],
            ],
            '事业财富' => [
                'wealthCode' => [
                    'name' => '详批一生财富',
                    'alias' => '一生财富',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '抓住一生z赚钱机会，改变命运'
                ],
                'career' => [
                    'name' => '事业运势详批',
                    'alias' => '事业运势',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '事业命盘精准解析，助力事业发展'
                ],
                'startup' => [
                    'name' => '是否有老板命',
                    'alias' => '老板命',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '创业经商必算，潜质能力优略势'
                ],

                'rich' => [
                    'name' => '2019财富运势',
                    'alias' => '财富运势',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '新年财运如何，是否能抓住发财机遇'
                ],
                'schoolwork' => [
                    'name' => '学业前程详批',
                    'alias' => '学业前程',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '事业命盘精准解析，助力事业发展'
                ],
            ],
            '命运人生' => [
                'luckYear' => [
                    'name' => '2019整年运势',
                    'alias' => '整年运势',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '详解流年七大运势，迎好运!'
                ],
                'children' => [
                    'name' => '孩子命格详批',
                    'alias' => '孩子命格',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '孩子是否天生好命，未来前途如何'
                ],

                'purple' => [
                    'name' => '一生命运详解',
                    'alias' => '一生命运',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '精准解析你的人生12个方向，概述一生命运'
                ],
                'fiveCharacter' => [
                    'name' => '五行命盘',
                    'alias' => '五行命盘',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '通过五行，了解一生命运'
                ],
                'opportunity' => [
                    'name' => '生日运势',
                    'alias' => '生日运势',
                    'price' => $price,
                    'total_fee' => 19.8,
                    'wechat_total_fee' => 19.8,
                    'desc' => '今年生日到明年生日，运势如何变化'
                ]
            ]
        ];

        foreach ($product_array as $product_class_name => $product_item){
            $product_class_count = $product_class_business->isExistName($product_class_name);
            if (!empty($product_class_count)){
                continue;
            }
            // 添加
            $product_class_info = $product_class_business->store([
                'name' => $product_class_name,
                'status' => 'yes'
            ]);
            foreach ($product_item as $identity => $value){
                $is_exist = $product_business->isExist($identity);
                if (!empty($is_exist)){
                    continue;
                }
                // 插入
                $product_business->store([
                    'pid' => $product_class_info->id,
                    'identity' => $identity,
                    'name' => $value['name'],
                    'alias' => $value['alias'],
                    'total_fee' => $value['total_fee'],
                    'wechat_total_fee' => $value['wechat_total_fee'],
                    'price' => $value['price'],
                    'status' => 'yes',
                    'desc' => $value['desc'],
                ]);
            }
        }
    }
}
