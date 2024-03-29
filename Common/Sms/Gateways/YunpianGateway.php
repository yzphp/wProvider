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
 * Class YunpianGateway.
 *
 * @see https://www.yunpian.com/doc/zh_CN/intl/single_send.html
 */
class YunpianGateway extends Gateway
{
    use HasHttpRequest;

    const ENDPOINT_TEMPLATE = 'https://%s.yunpian.com/%s/%s/%s.%s';

    const ENDPOINT_VERSION = 'v2';

    const ENDPOINT_FORMAT = 'json';

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
        $template = $message->getTemplate($this);
        $function = 'single_send';
        $option = [
            'form_params' => [
                'apikey' => $config->get('api_key'),
                'mobile' => $to->getUniversalNumber()
            ],
            'exceptions' => false,
        ];

        if (!is_null($template)) {
            $function = 'tpl_single_send';
            $data = [];

            $templateData = $message->getData($this);
            $templateData = isset($templateData) ? $templateData : [];
            foreach ($templateData as $key => $value) {
                $data[] = urlencode('#'.$key.'#') . '=' . urlencode($value);
            }

            $option['form_params'] = array_merge($option['form_params'], [
                'tpl_id' => $template,
                'tpl_value' => implode('&', $data)
            ]);
        } else {
            $content = $message->getContent($this);
            $signature = $config->get('signature', '');
            $option['form_params'] = array_merge($option['form_params'], [
                'text' => 0 === \stripos($content, '【') ? $content : $signature.$content
            ]);
        }

        $endpoint = $this->buildEndpoint('sms', 'sms', $function);
        $result = $this->request('post', $endpoint, $option);

        if ($result['code']) {
            throw new GatewayErrorException($result['msg'], $result['code'], $result);
        }

        return $result;
    }

    /**
     * Build endpoint url.
     *
     * @param string $type
     * @param string $resource
     * @param string $function
     *
     * @return string
     */
    protected function buildEndpoint($type, $resource, $function)
    {
        return sprintf(self::ENDPOINT_TEMPLATE, $type, self::ENDPOINT_VERSION, $resource, $function, self::ENDPOINT_FORMAT);
    }
}
