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

use wProvider\Sms\Support\Config;
use wProvider\Sms\Traits\HasHttpRequest;
use wProvider\Sms\Contracts\MessageInterface;
use wProvider\Sms\Contracts\PhoneNumberInterface;
use wProvider\Sms\Exceptions\GatewayErrorException;

/**
 * Class TinreeGateway.
 *
 * @see http://cms.tinree.com
 */
class TinreeGateway extends Gateway
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'http://api.tinree.com/api/v2/single_send';

    /**
     * @param \Sms\Contracts\PhoneNumberInterface $to
     * @param \Sms\Contracts\MessageInterface     $message
     * @param \Sms\Support\Config                 $config
     *
     * @return array
     *
     * @throws \Sms\Exceptions\GatewayErrorException
     */
    public function send(PhoneNumberInterface $to, MessageInterface $message, Config $config)
    {
        $params = [
            'accesskey' => $config->get('accesskey'),
            'secret' => $config->get('secret'),
            'sign' => $config->get('sign'),
            'templateId' => $message->getTemplate($this),
            'mobile' => $to->getNumber(),
            'content' => $this->buildContent($message),
        ];

        $result = $this->post(self::ENDPOINT_URL, $params);

        if (0 != $result['code']) {
            throw new GatewayErrorException($result['msg'], $result['code'], $result);
        }

        return $result;
    }

    /**
     * 构建发送内容
     * 用 data 数据合成内容，或者直接使用 data 的值
     *
     * @param MessageInterface $message
     * @return string
     */
    protected function buildContent(MessageInterface $message)
    {
        $data = $message->getData($this);

        if (is_array($data)) {
            return implode("##", $data);
        }

        return $data;
    }
}
