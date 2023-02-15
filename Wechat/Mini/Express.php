<?php

// +----------------------------------------------------------------------
// | WeChatDeveloper
// +----------------------------------------------------------------------
// | 版权所有 2014~2022 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/WeChatDeveloper
// +----------------------------------------------------------------------

namespace wProvider\Wechat\WeMini;

use WeChat\Contracts\BasicWeChat;

/**
 * 小程序即时配送
 * Class Delivery
 * @package WeMini
 */
class Express extends BasicWeChat
{



    /**
     * 下配送单接口
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function addOrder($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/order/add?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 可以对待接单状态的订单增加小费
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function addTip($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/order/addtips?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 取消配送单接口
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function cancelOrder($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/order/cancel?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 获取已支持的配送公司列表接口
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getAllImmeDelivery()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/delivery/getall?access_token=ACCESS_TOKEN';
        return $this->callGetApi($url);
    }

    /**
     * 拉取已绑定账号
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getBindAccount()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/account/getall?access_token=ACCESS_TOKEN';
        return $this->callGetApi($url);
    }
    /**
     * 配置面单打印员
     * 该接口用于配置面单打印员，可以设置多个，若需要使用微信打单 PC 软件，才需要调用。
    注：面单打印员不需要为小程序项目成员。
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function updatePrinter($data)
    {

        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/printer/update?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }
    /**
     * 拉取配送单信息
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getOrder($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/order/batchget?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }
    /**
     * 查询运单轨迹
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getPath($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/path/get?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }
    /**
     * 模拟配送公司更新配送单状态
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function mockUpdateOrder($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/test_update_order?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 预下配送单接口
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function preAddOrder($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/order/pre_add?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 预取消配送单接口
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function preCancelOrder($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/order/precancel?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 重新下单
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function reOrder($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/business/order/readd?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }
    /**
     * 传运单接口
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function followWaybill($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/delivery/open_msg/follow_waybill?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);
    }
    /**
     * 查运单接口
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function queryFollowTrace($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/delivery/open_msg/query_follow_trace?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);

    }
    /**
        * 更新物品信息接口
        * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function updateFollowWaybillGoods($data)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/express/delivery/open_msg/update_follow_waybill_goods?access_token=ACCESS_TOKEN';
        return $this->callPostApi($url, $data, true);

    }
}