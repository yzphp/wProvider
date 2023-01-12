<?php
/**
 * Created by PhpStorm.
 * User: iwang
 * Date: 2021/9/9
 * Time: 22:32
 */
namespace wProvider\WeChat\Shop;
use WeChat\Contracts\BasicWeChat;

class Order extends BasicWeChat
{
    /**
     * 生成订单
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function add(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/order/add?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
     * 同步订单支付结果
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function order_pay(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/order/pay?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
     * 获取订单详情
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function get(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/order/get?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
     * 生成支付参数
     * 需要先生成业务订单才可以发起生成支付订单。需要先生成业务订单才可以发起生成支付订单。 注： 1:一旦发起支付单，则业务订单的价格不可进行修改，若需要修改，请先关闭支付单，重新发起一笔支付订单。 2:每次需要拉起收银台时，请先调用此接口获取最新的支付参数。 3:使用本接口的订单需要在生成订单时将fund_type设为1。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getpaymentparams(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/order/getpaymentparams?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
}