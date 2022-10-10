<?php
/**
 * Created by PhpStorm.
 * User: iwang
 * Date: 2021/9/9
 * Time: 22:32
 */
namespace WeShop;
use WeChat\Contracts\BasicWeChat;

class Spu extends BasicWeChat
{
    public function add(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/add?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    public function get(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/get?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    public function get_list(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/get_list?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    public function update(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/update?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    public function del(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/del?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    public function listing(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/listing?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    public function delisting(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/delisting?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
    public function update_without_audit(array $data=[])
    {
        $url = 'https://api.weixin.qq.com/shop/spu/update_without_audit?access_token=ACCESS_TOKEN';

        $this->registerApi($url, __FUNCTION__, func_get_args());

        return $this->httpPostForJson($url, $data);
    }
}