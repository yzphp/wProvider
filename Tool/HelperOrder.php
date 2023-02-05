<?php
/**
 * 数组助手类
 * @author : weiyi <294287600@qq.com>
 * Licensed ( http://www.wycto.com )
 * Copyright (c) 2016~2099 http://www.wycto.com All rights reserved.
 */
namespace wProvider\Tool;

class HelperOrder
{

    /**
     * 格式化价格 保留到两位小数
     * @param $price
     * @return string
     */
    public static function formatPrice($price)
    {
        return sprintf("%.2f", $price);
    }
    /**
     * 生成唯一订单号
     * @param string $prefix
     * @return string
     */
    public static function builderOrderSn($prefix = '')
    {
        $prefix = !empty($prefix) ? $prefix : '';
        return  $prefix . date('Ymd') .
            substr(microtime(), 2, 5) .
            substr(implode(NULL,
                array_map('ord', str_split(substr(uniqid($prefix), 7, 13), 1))
            ), 0, 8).
            sprintf('%04d', rand(0, 9999));
    }
}
