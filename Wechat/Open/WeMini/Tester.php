<?php
namespace wProvider\WeChat\Open\WeMini;

use WeOpen\Contracts\BasicWeChat;

/**
 * 成员管理
 * Class Tester
 * @package WeOpen\MiniApp
 */
class Tester extends BasicWeChat
{

    /**
     * 1、绑定微信用户为小程序体验者
     * @param string $testid 微信号
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function bindTester($testid)
    {
        $url = 'https://api.weixin.qq.com/wxa/bind_tester?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['wechatid' => $testid], true);
    }

    /**
     * 2、解除绑定小程序的体验者
     * @param string $userstr 人员对应的唯一字符串
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function unbindTester($userstr)
    {
        $url = 'https://api.weixin.qq.com/wxa/unbind_tester?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['userstr' => $userstr], true);
    }

    /**
     * 3. 获取体验者列表
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function getTesterList()
    {
        $url = 'https://api.weixin.qq.com/wxa/memberauth?access_token=ACCESS_TOKEN';
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->httpPostForJson($url, ['action' => 'get_experiencer'], true);
    }

}