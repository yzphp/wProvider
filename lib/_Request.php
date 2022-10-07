<?php

namespace wProvider\lib;


class _Request
{
    /**
     * [_requestGet CURL GET请求]
     * @param  [type] $url    [请求目标]
     * @param  [type] $meta   [请求参数]
     * @param  [type] $header [头部参数]
     * @return [type]         [结果返回]
     */
    public static function _requestGet($url, $meta, $header = array(), $referer = '',  $timeout = 30)
    {
        $ch = curl_init();
        //设置抓取的url
        curl_setopt($ch, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //执行命令
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            curl_close($ch);
            throw new WxPayv3Exception($error);
        }
        curl_close($ch);
        return $response;
    }

    /**
     * [_requestPost CURL POST请求]
     * @param  [type]  $url     [请求目标]
     * @param  [type]  $data    [请求参数]
     * @param  array   $header  [头部参数]
     * @param  string  $referer [referer]
     * @param  integer $timeout [超时时间：单位秒]
     * @return [type]           [结果返回]
     */
    public static function _requestPost($url, $data, $header = array(), $referer = '', $timeout = 30)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        //避免https 的ssl验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSLVERSION, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        // 模拟来源
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            curl_close($ch);
            throw new WxPayv3Exception($error);
        }
        curl_close($ch);
        return $response;
    }
}