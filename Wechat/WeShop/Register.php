<?php
/**
 * Created by PhpStorm.
 * User: iwang
 * Date: 2021/9/9
 * Time: 22:31
 */
namespace WeShop;
use WeChat\Contracts\BasicWeChat;

class Register extends BasicWeChat
{
    /**
     * 接入申请
     * 通过此接口开通自定义版交易组件，将同步返回接入结果，不再有异步事件回调。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function apply()
    {
        $url = 'https://api.weixin.qq.com/shop/register/apply?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url);
    }

    /**
     * 获取接入状态
     * 如果账户未接入，将返回错误码1040003。
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function check(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/register/check?access_token=ACCESS_TOKEN';
        
        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    /**
     * 完成接入任务
     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function finish_access_info()
    {
        $url = 'https://api.weixin.qq.com/shop/register/finish_access_info?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }
    /**
     * 场景接入申请

     * @return array
     * @throws Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function apply_scene()
    {
        $url = 'https://api.weixin.qq.com/shop/register/apply_scene?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, $data);
    }
}