<?php
include "../include.php";
include "config.php";

// 注册授权 AccessToken 处理
// 快速 注册应用无权限调用
// 重写 配置文件中 component_appsecret 为小程序 secret 即可

try{

    // 实例服务接口
    $open = new \WeOpen\Service($config);
    
    // 获取接口操作实例
    $wechat = $open->instance('Ocr', $config['appid']);
    //营业执照
    // $rs = $wechat->businessLicense(['img_url'=>urlencode('https://saas.qdapi.com/uploads/20200607133432f6f913682.jpg')]);
    // var_export($rs);
    //身份证正面
    // $rs = $wechat->idcard(['type'=>'Front ', 'img_url'=>'https://saas.qdapi.com/uploads/2020052116533308de37511.jpg']);
    // var_export($rs);
    //身份证背面
    // $rs = $wechat->idcard(['type'=>'Back ', 'img_url'=>'https://saas.qdapi.com/uploads/20200521165339e6fc64955.jpg']);
    // var_export($rs);
    //银行卡
    // $rs = $wechat->bankcard(['img_url'=>'https://saas.qdapi.com/uploads/27213757428c7e2b4709a9ddf67d563fb4a03952.jpg']);
    // var_export($rs);

    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo 'ERROR:'.$e->getMessage() . PHP_EOL;

}