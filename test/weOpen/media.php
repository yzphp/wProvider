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
    $wechat = $open->instance('Media', 'wxd9e6dab18af84245');
    
    // 新增临时素材
    // $list = $wechat->add('dd.jpg');
    // var_export($list);
    // array (
    //     'type' => 'image',
    //     'media_id' => '-Vzmpo9OvQrRwtZBSkPoJyKRy30WNHBvKdRgsTqZDgb1qs05k4eYwdfQ_0_jmCB6',
    //     'created_at' => 1587216279,
    //     'item' => 
    //     array (
    //     ),
    //   )

     // 获取临时素材
    $list = $wechat->get('-Vzmpo9OvQrRwtZBSkPoJyKRy30WNHBvKdRgsTqZDgb1qs05k4eYwdfQ_0_jmCB6');
    header('Content-type: image/JPEG');
    echo($list);
    
    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo 'ERROR:'.$e->getMessage() . PHP_EOL;

}