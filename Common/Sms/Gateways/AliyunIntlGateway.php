<?php

namespace wProvider\Sms\Gateways;

use Sms\Contracts\MessageInterface;
use Sms\Contracts\PhoneNumberInterface;
use Sms\Exceptions\GatewayErrorException;
use Sms\Support\Config;
use Sms\Traits\HasHttpRequest;

/**
 * Class AliyunIntlGateway
 *
 * @package \Sms\Gateways
 *
 * @see https://www.alibabacloud.com/help/zh/doc-detail/162279.htm
 */
class AliyunIntlGateway extends Gateway
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://dysmsapi.ap-southeast-1.aliyuncs.com';

    const ENDPOINT_ACTION = 'SendMessageWithTemplate';

    const ENDPOINT_VERSION = '2018-05-01';

    const ENDPOINT_FORMAT = 'JSON';

    const ENDPOINT_REGION_ID = 'ap-southeast-1';

    const ENDPOINT_SIGNATURE_METHOD = 'HMAC-SHA1';

    const ENDPOINT_SIGNATURE_VERSION = '1.0';


    /**
     * @param \Sms\Contracts\PhoneNumberInterface $to
     * @param \Sms\Contracts\MessageInterface     $message
     * @param \Sms\Support\Config                 $config
     *
     * @return array
     *
     * @throws \Sms\Exceptions\GatewayErrorException
     *
     */
    public function send(PhoneNumberInterface $to, MessageInterface $message, Config $config)
    {
        $data = $message->getData($this);

        $signName = !empty($data['sign_name']) ? $data['sign_name'] : $config->get('sign_name');

        unset($data['sign_name']);

        $params = [
            'RegionId' => self::ENDPOINT_REGION_ID,
            'AccessKeyId' => $config->get('access_key_id'),
            'Format' => self::ENDPOINT_FORMAT,
            'SignatureMethod' => self::ENDPOINT_SIGNATURE_METHOD,
            'SignatureVersion' => self::ENDPOINT_SIGNATURE_VERSION,
            'SignatureNonce' => uniqid('', true),
            'Timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
            'Version' => self::ENDPOINT_VERSION,
            'To' => !\is_null($to->getIDDCode()) ? (int) $to->getZeroPrefixedNumber() : $to->getNumber(),
            'Action' => self::ENDPOINT_ACTION,
            'From' => $signName,
            'TemplateCode' => $message->getTemplate($this),
            'TemplateParam' => json_encode($data, JSON_FORCE_OBJECT),
        ];

        $params['Signature'] = $this->generateSign($params);

        $result = $this->get(self::ENDPOINT_URL, $params);

        if ('OK' !== $result['ResponseCode']) {
            throw new GatewayErrorException($result['ResponseDescription'], $result['ResponseCode'], $result);
        }

        return $result;
    }

    /**
     * Generate sign
     *
     * @param  array  $params
     *
     * @return string
     */
    protected function generateSign(array $params)
    {
        ksort($params);
        $accessKeySecret = $this->config->get('access_key_secret');
        $stringToSign = 'GET&%2F&'.urlencode(http_build_query($params, '', '&', PHP_QUERY_RFC3986));

        return base64_encode(hash_hmac('sha1', $stringToSign, $accessKeySecret.'&', true));
    }
}
