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

use GuzzleHttp\Exception\ClientException;
use wProvider\Sms\Contracts\MessageInterface;
use wProvider\Sms\Contracts\PhoneNumberInterface;
use wProvider\Sms\Exceptions\GatewayErrorException;
use wProvider\Sms\Support\Config;
use wProvider\Sms\Traits\HasHttpRequest;

/**
 * Class TwilioGateway.
 *
 *  @see https://www.twilio.com/docs/api/messaging/send-messages
 */
class TwilioGateway extends Gateway
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://api.twilio.com/2010-04-01/Accounts/%s/Messages.json';

    protected $errorStatuses = [
        'failed',
        'undelivered',
    ];

    public function getName()
    {
        return 'twilio';
    }

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
        $accountSid = $config->get('account_sid');
        $endpoint = $this->buildEndPoint($accountSid);

        $params = [
            'To' => $to->getUniversalNumber(),
            'From' => $config->get('from'),
            'Body' => $message->getContent($this),
        ];

        try {
            $result = $this->request('post', $endpoint, [
                'auth' => [
                    $accountSid,
                    $config->get('token'),
                ],
                'form_params' => $params,
            ]);
            if (in_array($result['status'], $this->errorStatuses) || !is_null($result['error_code'])) {
                throw new GatewayErrorException($result['message'], $result['error_code'], $result);
            }
        } catch (ClientException $e) {
            throw new GatewayErrorException($e->getMessage(), $e->getCode());
        }

        return $result;
    }

    /**
     * build endpoint url.
     *
     * @param string $accountSid
     *
     * @return string
     */
    protected function buildEndPoint($accountSid)
    {
        return sprintf(self::ENDPOINT_URL, $accountSid);
    }
}
