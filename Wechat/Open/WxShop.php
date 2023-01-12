<?php
namespace wProvider\WeChat\Open;


/**
 * 公众号小程序授权支持
 * Class MiniApp
 * @package WeOpen
 */
class WxShop extends Service
{
    /**
     * 注册小商店账号
     *
     * @param [type] $wx_name
     * @param [type] $id_card_name
     * @param [type] $id_card_number
     * @param [type] $channel_id
     * @param integer $api_openstore_type
     * @param string $auth_page_url
     * @return void
     * @author Leo <13708867890>
     * @since 2022-06-12 14:25:34
     */
    public function register_shop($wx_name,$id_card_name,$id_card_number,$channel_id,$api_openstore_type = 1,$auth_page_url='')
    {
        $component_access_token = $this->getComponentAccessToken();
        $url = "https://api.weixin.qq.com/product/register/register_shop?component_access_token={$component_access_token}";
        return $this->httpPostForJson($url, [
            'wx_name'                  => $wx_name
            ,'id_card_name'                 => $id_card_name
            ,'id_card_number'            => $id_card_number
            ,'channel_id' => $channel_id
            ,'api_openstore_type'   => $api_openstore_type
            ,'auth_page_url'      => $auth_page_url
        ]);
    }
    /**
     * 异步状态查询
     *
     * @param [type] $wx_name
     * @return void
     * @author Leo <13708867890>
     * @since 2022-06-12 15:30:18
     */
    public function check_audit_status($wx_name)
    {
        $component_access_token = $this->getComponentAccessToken();
        $url = "https://api.weixin.qq.com/product/register/check_audit_status?component_access_token={$component_access_token}";
        return $this->httpPostForJson($url, ['wx_name' => $wx_name]);
    }
}