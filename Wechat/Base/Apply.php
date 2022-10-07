<?php

namespace wProvider\Base;
//商户进件 SDK
//分普通服务商 也就是特约 和 电商收付通的二级商户
use wProvider\lib\_Request;
use wProvider\lib\Signs;
use wProvider\lib\WxPayv3Exception;

class Apply
{

    /****************************************************特约商户进件* */
    /**
     * 特约商户进件 post
     * 注意：不是电商收付通的商户进件哦
     */
    public function applyment($param = [])
    {
        $url = 'https://api.mch.weixin.qq.com/v3/applyment4sub/applyment/';

        //法人身份账号和姓名加密
        if ($param['subject_info']['identity_info']['id_card_info']['id_card_name']) {
            $param['subject_info']['identity_info']['id_card_info']['id_card_name'] = Signs::getEncrypt($param['subject_info']['identity_info']['id_card_info']['id_card_name']);
        }
        if ($param['subject_info']['identity_info']['id_card_info']['id_card_number']) {
            $param['subject_info']['identity_info']['id_card_info']['id_card_number'] = Signs::getEncrypt($param['subject_info']['identity_info']['id_card_info']['id_card_number']);
        }

        //结算银行账户 加密
        if ($param['bank_account_info']['account_name']) {
            $param['bank_account_info']['account_name'] = Signs::getEncrypt($param['bank_account_info']['account_name']);
        }
        if ($param['bank_account_info']['account_number']) {
            $param['bank_account_info']['account_number'] = Signs::getEncrypt($param['bank_account_info']['account_number']);
        }

        //超级管理员信息加密
        if ($param['contact_info']['contact_name']) {
            $param['contact_info']['contact_name'] = Signs::getEncrypt($param['contact_info']['contact_name']);
        }
        if ($param['contact_info']['contact_id_number']) {
            $param['contact_info']['contact_id_number'] = Signs::getEncrypt($param['contact_info']['contact_id_number']);
        }
        if ($param['contact_info']['openid']) {
            $param['contact_info']['openid'] = Signs::getEncrypt($param['contact_info']['openid']);
        }
        if ($param['contact_info']['mobile_phone']) {
            $param['contact_info']['mobile_phone'] = Signs::getEncrypt($param['contact_info']['mobile_phone']);
        }
        if ($param['contact_info']['contact_email']) {
            $param['contact_info']['contact_email'] = Signs::getEncrypt($param['contact_info']['contact_email']);
        }
        //

        $data = json_encode($param);
        return Signs::_Postresponse($url, $data);
    }

    /**
     * 根据申请单号 查询特约商户的申请情况
     * @param string applyment_id 申请单号
     */
    public function getApplymentByid($applyment_id)
    {
        $url = 'https://api.mch.weixin.qq.com/v3/applyment4sub/applyment/applyment_id/' . $applyment_id;
        $ret = Signs::_Getresponse($url);
        return $ret;
    }

    /**
     * 根据业务申请编号 查询特约商户的申请情况
     * @param string business_code 业务申请编号
     */
    public function getApplymentByno($business_code)
    {
        $url = 'https://api.mch.weixin.qq.com/v3/ecommerce/applyments/business_code' . $business_code;
        $ret = Signs::_Getresponse($url);
        return $ret;
    }

    /**
     * 修改结算帐号 post
     * 注意：普通服务商 修改已签约的特约商户的结算账户信息
     * @param array post 提交参数
     * @param string sub_mchid 特约商户号
     * @param string account_type 账户类型 ACCOUNT_TYPE_BUSINESS：对公银行账户 ACCOUNT_TYPE_PRIVATE：经营者个人银行卡
     * @param string account_bank 开户银行（17个银行账户名称）或 其他银行
     * @param string bank_address_code 开户银行省市编码 （省市编码）
     * @param string bank_name 开户银行全称（含支行）
     * @param string bank_branch_id 开户银行联行号
     * @param string account_number 银行账号 需公钥加密
     */
    public function modifySettlement($post = [])
    {
        $url = 'https://api.mch.weixin.qq.com/v3/apply4sub/sub_merchants/' . $post['sub_mchid'] . '/modify-settlement';
        $data = [
            'account_type' => $post['account_type'],
            'account_bank' => $post['account_bank'],
            'bank_address_code' => $post['bank_address_code'],
            'bank_name' => $post['bank_name'],
            'account_number' => Signs::getEncrypt($post['account_number'])
        ];
        if ($post['bank_branch_id']) {
            $data['bank_branch_id'] = $post['bank_branch_id']; //假如存在 就显示
        }
        $data = json_encode($data);
        $ret = Signs::_Postresponse($url, $data); //head状态码是204 假如有误 返回存在code
        return $ret;
    }

    /**
     * 查询结算账户
     * 银行账户或掩码显示
     * @param string sub_mchid 已签约的特约商户号
     */
    public function findSettlement($sub_mchid)
    {
        $url = 'https://api.mch.weixin.qq.com/v3/apply4sub/sub_merchants/' . $sub_mchid . '/settlement';
        $ret = Signs::_Getresponse($url); //head状态码是204 假如有误 返回存在code
        return $ret;
    }


    /**
     * getSettlement 查询结算账户 收付通
     * 普通服务商（支付机构、银行不可用），可使用本接口查询其进件、已签约的特约商户-结算账户信息（敏感信息掩码）。 该接口可用于核实是否成功修改结算账户信息、及查询系统汇款验证结果。
     * @param string sub_mchid 特约商户号
     */
    public function getSettlement($sub_mchid)
    {
        if (strlen($sub_mchid) < 8) {
            throw new WxPayv3Exception('特约商户号:长度最小8个字节');
        }
        $url = 'https://api.mch.weixin.qq.com/v3/apply4sub/sub_merchants/' . $sub_mchid . '/settlement';
        return Signs::_Getresponse($url);
    }



}