<?php
namespace wProvider\WeChat\Open\WeMini;

use WeOpen\Contracts\BasicWeChat;

/**
 * 小程序ORC服务
 * Class Ocr
 * 使用前需要先申请
 * 申请地址:https://developers.weixin.qq.com/community/servicemarket/detail/000ce4cec24ca026d37900ed551415
 * @package WeMini
 */
class Ocr extends BasicWeChat
{
    /**
     * 本接口提供基于小程序的银行卡 OCR 识别
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function bankcard($data)
    {
        $url = 'https://api.weixin.qq.com/cv/ocr/bankcard?img_url=ENCODE_URL&access_token=ACCESS_TOKEN';
        $url = str_replace('ENCODE_URL', urlencode($data['img_url']), $url);
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 本接口提供基于小程序的营业执照 OCR 识别
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function businessLicense($data)
    {
        $url = 'https://api.weixin.qq.com/cv/ocr/bizlicense?img_url=ENCODE_URL&access_token=ACCESS_TOKEN';
        $url = str_replace('ENCODE_URL', urlencode($data['img_url']), $url);
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 本接口提供基于小程序的驾驶证 OCR 识别
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function driverLicense($data)
    {
        $url = 'https://api.weixin.qq.com/cv/ocr/drivinglicense?img_url=ENCODE_URL&access_token=ACCESS_TOKEN';
        $url = str_replace('ENCODE_URL', urlencode($data['img_url']), $url);
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 本接口提供基于小程序的身份证 OCR 识别
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function idcard($data)
    {
        $url = 'https://api.weixin.qq.com/cv/ocr/idcard?type=MODE&img_url=ENCODE_URL&access_token=ACCESS_TOKEN';
        $url = str_replace('MODE', urlencode($data['type']), $url);
        $url = str_replace('ENCODE_URL', urlencode($data['img_url']), $url);
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 本接口提供基于小程序的通用印刷体 OCR 识别
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function printedText($data)
    {
        $url = 'https://api.weixin.qq.com/cv/ocr/comm?img_url=ENCODE_URL&access_token=ACCESS_TOKEN';
        $url = str_replace('ENCODE_URL', urlencode($data['img_url']), $url);
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

    /**
     * 本接口提供基于小程序的行驶证 OCR 识别
     * @param array $data
     * @return array
     * @throws \WeChat\Exceptions\InvalidResponseException
     * @throws \WeChat\Exceptions\LocalCacheException
     */
    public function vehicleLicense($data)
    {
        $url = 'https://api.weixin.qq.com/cv/ocr/driving?type=MODE&img_url=ENCODE_URL&access_token=ACCESS_TOKEN';
        $url = str_replace('ENCODE_URL', urlencode($data['img_url']), $url);
        $url = str_replace('MODE', urlencode($data['type']), $url);
        $this->registerApi($url, __FUNCTION__, func_get_args());
        return $this->callPostApi($url, $data, true);
    }

}