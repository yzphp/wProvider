<?php
/**
 * Created by PhpStorm.
 * User: iwang
 * Date: 2021/9/9
 * Time: 22:35
 */
namespace WeShop;
use WeChat\Contracts\BasicWeChat;

class Aftersale extends BasicWeChat
{
    /**
     * 创建售后
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function add(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/aftersale/add?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
 * 创建售后
 * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
 * @return array
 * @throws Exceptions\InvalidResponseException
 * @throws \WeChat\Exceptions\LocalCacheException
 */
    public function get(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/aftersale/get?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
 * 创建售后
 * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
 * @return array
 * @throws Exceptions\InvalidResponseException
 * @throws \WeChat\Exceptions\LocalCacheException
 */
    public function update(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/aftersale/update?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
}