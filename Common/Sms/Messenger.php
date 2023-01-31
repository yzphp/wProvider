<?php

/*
 * This file is part of the overtrue/easy-sms.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sms;

use Sms\Contracts\MessageInterface;
use Sms\Contracts\PhoneNumberInterface;
use Sms\Exceptions\NoGatewayAvailableException;

/**
 * Class Messenger.
 */
class Messenger
{
    const STATUS_SUCCESS = 'success';

    const STATUS_FAILURE = 'failure';

    /**
     * @var \Sms\EasySms
     */
    protected $easySms;

    /**
     * Messenger constructor.
     *
     * @param \Sms\EasySms $easySms
     */
    public function __construct(EasySms $easySms)
    {
        $this->easySms = $easySms;
    }

    /**
     * Send a message.
     *
     * @param \Sms\Contracts\PhoneNumberInterface $to
     * @param \Sms\Contracts\MessageInterface     $message
     * @param array                                            $gateways
     *
     * @return array
     *
     * @throws \Sms\Exceptions\NoGatewayAvailableException
     */
    public function send(PhoneNumberInterface $to, MessageInterface $message, array $gateways = [])
    {
        $results = [];
        $isSuccessful = false;

        foreach ($gateways as $gateway => $config) {
            try {
                $results[$gateway] = [
                    'gateway' => $gateway,
                    'status' => self::STATUS_SUCCESS,
                    'result' => $this->easySms->gateway($gateway)->send($to, $message, $config),
                ];
                $isSuccessful = true;

                break;
            } catch (\Exception $e) {
                $results[$gateway] = [
                    'gateway' => $gateway,
                    'status' => self::STATUS_FAILURE,
                    'exception' => $e,
                ];
            } catch (\Throwable $e) {
                $results[$gateway] = [
                    'gateway' => $gateway,
                    'status' => self::STATUS_FAILURE,
                    'exception' => $e,
                ];
            }
        }

        if (!$isSuccessful) {
            throw new NoGatewayAvailableException($results);
        }

        return $results;
    }
}
