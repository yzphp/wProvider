<?php

namespace wProvider\lib;

/**
 * 微信支付API异常类
 */
class WxPayv3Exception extends \Exception
{
    public function errorMessage()
    {
        return $this->getMessage();
    }
}
