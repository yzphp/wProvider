<?php
/**
 * Created by PhpStorm.
 * User: iwang
 * Date: 2021/9/9
 * Time: 22:34
 */
namespace WeShop;
use WeChat\Contracts\BasicWeChat;

class Base extends BasicWeChat
{
    /**
     * 获取商品类目
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function cat_get(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/cat/get?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
     * 上传图片
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function img_upload(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/img/upload?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
 * 获取小程序资质
 * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
 * @return array
 * @throws Exceptions\InvalidResponseException
 * @throws \WeChat\Exceptions\LocalCacheException
 */
    public function get_audit_certificate(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/audit/get_miniapp_certificate?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
     * 获取小程序资质
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function get_audit_result(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/audit/result?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
     * 检查场景值是否在支付校验范围内
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function scene_check(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/scene/check?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
 * 获取快递公司列表
 * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
 * @return array
 * @throws Exceptions\InvalidResponseException
 * @throws \WeChat\Exceptions\LocalCacheException
 */
    public function get_company_list(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/delivery/get_company_list?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
}