<?php

/*
 * This file is part of the overtrue/easy-sms.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace wProvider\Sms\Gateways;

use wProvider\Sms\Contracts\MessageInterface;
use wProvider\Sms\Contracts\PhoneNumberInterface;
use wProvider\Sms\Exceptions\GatewayErrorException;
use wProvider\Sms\Support\Config;
use wProvider\Sms\Traits\HasHttpRequest;

/**
 * Class ModuyunGateway.
 *
 * @see https://www.moduyun.com/doc/index.html#10002
 */
class ModuyunGateway extends Gateway
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://live.moduyun.com/sms/v2/sendsinglesms';

    /**
     * @param \Sms\Contracts\PhoneNumberInterface $to
     * @param \Sms\Contracts\MessageInterface     $message
     * @param \Sms\Support\Config                 $config
     *
     * @return array
     *
     * @throws \Sms\Exceptions\GatewayErrorException ;
     */
    public function send(PhoneNumberInterface $to, MessageInterface $message, Config $config)
    {
        $urlParams = [
            'accesskey' => $config->get('accesskey'),
            'random' => rand(100000, 999999),
        ];

        $params = [
            'tel' => [
                'mobile' => $to->getNumber(),
                'nationcode' => $to->getIDDCode() ?: '86',
            ],
            'signId' => $config->get('signId', ''),
            'templateId' => $message->getTemplate($this),
            'time' => time(),
            'type' => $config->get('type', 0),
            'params' => array_values($message->getData($this)),
            'ext' => '',
            'extend' => '',
        ];
        $params['sig'] = $this->generateSign($params, $urlParams['random']);

        $result = $this->postJson($this->getEndpointUrl($urlParams), $params);
        $result = is_string($result) ? json_decode($result, true) : $result;
        if (0 != $result['result']) {
            throw new GatewayErrorException($result['errmsg'], $result['result'], $result);
        }

        return $result;
    }

    /**
     * @param array $params
     *
     * @return string
     */
    protected function getEndpointUrl($params)
    {
        return self::ENDPOINT_URL . '?' . http_build_query($params);
    }

    /**
     * Generate Sign.
     *
     * @param array  $params
     * @param string $random
     *
     * @return string
     */
    protected function generateSign($params, $random)
    {
        return hash('sha256', sprintf(
            'secretkey=%s&random=%d&time=%d&mobile=%s',
            $this->config->get('secretkey'),
            $random,
            $params['time'],
            $params['tel']['mobile']
        ));
    }
}
