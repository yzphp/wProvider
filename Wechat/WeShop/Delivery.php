<?php
/**
 * Created by PhpStorm.
 * User: iwang
 * Date: 2021/9/9
 * Time: 22:33
 */
namespace WeShop;
use WeChat\Contracts\BasicWeChat;

class Delivery extends BasicWeChat
{
    /**
     * 订单发货
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function send(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/delivery/send?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
 * 订单确认收货
 * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
 * @return array
 * @throws Exceptions\InvalidResponseException
 * @throws \WeChat\Exceptions\LocalCacheException
 */
    public function recieve(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/delivery/recieve?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
}