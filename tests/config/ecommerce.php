<?php
/**
 * Created by PhpStorm.
 * User: hgq <393210556@qq.com>
 * Date: 2021/11/18
 * Time: 下午 03:28
 */

return [
    //合单商户信息APP
    'APP' => [
        'COMBINE_APPID' => 'xxx', // 合单发起方的appid
    ],
    //合单商户信息公众号
    'PUB' => [
        'COMBINE_APPID' => 'xxx', // 合单发起方的appid
    ],
    //合单商户信息小程序
    'XCX' => [
        'COMBINE_APPID' => 'wxe3d38f14fc8370f8', // 合单发起方的appid
    ],
    //分账APPid
    'ACCOUNT' => [
        'COMBINE_APPID' => 'wxe3d38f14fc8370f8', // 分账APPID
    ],

    'COMBINE_APPID' => 'xxx', // 默认合单APPID，示例值：1900000109
    'MCHID' => '1628607784', //合单发起方商户号。示例值：1900000109
    'COMBINE_MCHID' => '1628607784', // 合单发起方商户号。服务商商户号，示例值：1900000109
    'SERIAL_NO' => '50516944BC6F500D67D0213AE95706A59EEF69D6', //网站证书的序列号，非实时获取的序列号

    'APPKEY' => 'e0b49d9cd1e8f715a90d04cf751cfd23',    // 合单发起方 key
    'APPKERV3' => 'e0b49d9cd1e8f715a90d04cf751cfd23',  // 合单发起方v3版本key

    'SSLCERT_PATH' => getcwd() . '/cert/apiclient_cert.pem',// 合单发起方证书(公钥)地址，暂时没用
    'SSLKEY_PATH' => getcwd() . '/cert/apiclient_key.pem',// 合单发起方私钥地址

    'PLATFORM_SERIAL_NO_PATH' => getcwd() . '/cert/platform_serial_no.json', // 平台证书的序列号txt
    'PLATFORM_CERT_PATH' => getcwd() . '/cert/platform_cert.pem', // 平台证书

    /**
     * 注意：SERIAL_NO有2个
     * 支付或退款成功 微信给的回调的 heater里面 有个证书序列号 wechatpay-serial 这个SERIAL_NO是平台证书的序列号
     * 构建API请求 Authorization 的时候也有个SERIAL_NO，这个SERIAL_NO是去商户后台，【API安全】=》API证书 查看序列号的那个序列号
     */

    //支付通知地址
    'PAY_NOTIFY_URL' => 'http://xxxxx.com/EcommerceNotify/pay.html',

    //退款通知地址
    'REFUND_NOTIFY_URL' => 'http://xxxxx.com/EcommerceNotify/refund.html',
];