<?php
namespace WeOpen\WeMini;

use WeOpen\Contracts\BasicWeChat;

/**
 * 基础信息设置
 * Class Basic
 * @package WeOpen\MiniApp
 */
class Basic extends BasicWeChat
{

    /**
     * 1. 设置小程序隐私设置（是否可被搜索）
     * @param integer $status 1表示不可搜索，0表示可搜索
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function changeWxaSearchStatus($status)
    {
        $url = 'https://api.weixin.qq.com/wxa/changewxasearchstatus?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['status' => $status], true);
    }

    /**
     * 2. 查询小程序当前隐私设置（是否可被搜索）
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getWxaSearchStatus()
    {
        $url = 'https://api.weixin.qq.com/wxa/getwxasearchstatus?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpGetForJson($url);
    }

}