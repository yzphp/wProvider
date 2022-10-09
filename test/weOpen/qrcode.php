<?php
include "../include.php";
include "config.php";

// 注册授权 AccessToken 处理
$config['GetAccessTokenCallback'] = function ($authorizer_appid) use ($config) {
    $open = new \WeOpen\Service($config);
    $authorizer_refresh_token = 'refreshtoken@@@AYjfRIO2qvD4HfQ_fGRhJnvGLAIPMzsaCc9oCYaZXhM'; // 通过$authorizer_appid从数据库去找吧，在授权绑定的时候获取
    $result = $open->refreshAccessToken($authorizer_appid, $authorizer_refresh_token);
    if (empty($result['authorizer_access_token'])) {
        throw new \WeOpen\Exceptions\InvalidResponseException($result['errmsg'], '0');
    }
    $data = [
        'authorizer_access_token'  => $result['authorizer_access_token'],
        'authorizer_refresh_token' => $result['authorizer_refresh_token'],
    ];
    // 需要把$data记录到数据库
    return $result['authorizer_access_token'];
};

try{

    // 实例服务接口
    $open = new \WeOpen\Service($config);
    
    // 获取接口操作实例
    $wechat = $open->instance('qrcode', 'wxd9e6dab18af84245');
    
    // 获取小程序码
    // $file = $wechat->createMiniPath('page/index/index');
    // header('Content-type:image/png');
    // echo $file;

    // var_export($list);

    //获取小程序码 带场景参数

    // $file = $wechat->createMiniScene('param=string','pages/index/index');
    // header('Content-type:image/png');
    // echo $file;

    $rs = $wechat->shortUrl('http://saas.zskey.com');

    var_export($rs);

 

    
    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo 'ERROR:'.$e->getMessage() . PHP_EOL;

}