<?php
/**
 * Created by PhpStorm.
 * User: iwang
 * Date: 2021/9/9
 * Time: 22:34
 */
namespace WeShop;
class Account
{
    /**
     * 获取商家类目列表
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function get_category_list()
    {
        $url = 'https://api.weixin.qq.com/shop/account/get_category_list?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url);
    }
}