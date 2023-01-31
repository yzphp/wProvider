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

use Closure;
use Sms\Contracts\GatewayInterface;
use Sms\Contracts\MessageInterface;
use Sms\Contracts\PhoneNumberInterface;
use Sms\Contracts\StrategyInterface;
use Sms\Exceptions\InvalidArgumentException;
use Sms\Gateways\Gateway;
use Sms\Strategies\OrderStrategy;
use Sms\Support\Config;

/**
 * Class EasySms.
 */
class Sms
{
    /**
     * @var \Sms\Support\Config
     */
    protected $config;

    /**
     * @var string
     */
    protected $defaultGateway;

    /**
     * @var array
     */
    protected $customCreators = [];

    /**
     * @var array
     */
    protected $gateways = [];

    /**
     * @var \Sms\Messenger
     */
    protected $messenger;

    /**
     * @var array
     */
    protected $strategies = [];

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config);
    }

    /**
     * Send a message.
     *
     * @param string|array                                       $to
     * @param \Sms\Contracts\MessageInterface|array $message
     * @param array                                              $gateways
     *
     * @return array
     *
     * @throws \Sms\Exceptions\InvalidArgumentException
     * @throws \Sms\Exceptions\NoGatewayAvailableException
     */
    public function send($to, $message, array $gateways = [])
    {
        $to = $this->formatPhoneNumber($to);
        $message = $this->formatMessage($message);
        $gateways = empty($gateways) ? $message->getGateways() : $gateways;

        if (empty($gateways)) {
            $gateways = $this->config->get('default.gateways', []);
        }

        return $this->getMessenger()->send($to, $message, $this->formatGateways($gateways));
    }

    /**
     * Create a gateway.
     *
     * @param string|null $name
     *
     * @return \Sms\Contracts\GatewayInterface
     *
     * @throws \Sms\Exceptions\InvalidArgumentException
     */
    public function gateway($name)
    {
        if (!isset($this->gateways[$name])) {
            $this->gateways[$name] = $this->createGateway($name);
        }

        return $this->gateways[$name];
    }

    /**
     * Get a strategy instance.
     *
     * @param string|null $strategy
     *
     * @return \Sms\Contracts\StrategyInterface
     *
     * @throws \Sms\Exceptions\InvalidArgumentException
     */
    public function strategy($strategy = null)
    {
        if (\is_null($strategy)) {
            $strategy = $this->config->get('default.strategy', OrderStrategy::class);
        }

        if (!\class_exists($strategy)) {
            $strategy = __NAMESPACE__.'\Strategies\\'.\ucfirst($strategy);
        }

        if (!\class_exists($strategy)) {
            throw new InvalidArgumentException("Unsupported strategy \"{$strategy}\"");
        }

        if (empty($this->strategies[$strategy]) || !($this->strategies[$strategy] instanceof StrategyInterface)) {
            $this->strategies[$strategy] = new $strategy($this);
        }

        return $this->strategies[$strategy];
    }

    /**
     * Register a custom driver creator Closure.
     *
     * @param string   $name
     * @param \Closure $callback
     *
     * @return $this
     */
    public function extend($name, Closure $callback)
    {
        $this->customCreators[$name] = $callback;

        return $this;
    }

    /**
     * @return \Sms\Support\Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return \Sms\Messenger
     */
    public function getMessenger()
    {
        return $this->messenger ?: $this->messenger = new Messenger($this);
    }

    /**
     * Create a new driver instance.
     *
     * @param string $name
     *
     * @throws \InvalidArgumentException
     *
     * @return GatewayInterface
     *
     * @throws \Sms\Exceptions\InvalidArgumentException
     */
    protected function createGateway($name)
    {
        $config = $this->config->get("gateways.{$name}", []);

        if (!isset($config['timeout'])) {
            $config['timeout'] = $this->config->get('timeout', Gateway::DEFAULT_TIMEOUT);
        }

        $config['options'] = $this->config->get('options', []);

        if (isset($this->customCreators[$name])) {
            $gateway = $this->callCustomCreator($name, $config);
        } else {
            $className = $this->formatGatewayClassName($name);
            $gateway = $this->makeGateway($className, $config);
        }

        if (!($gateway instanceof GatewayInterface)) {
            throw new InvalidArgumentException(\sprintf('Gateway "%s" must implement interface %s.', $name, GatewayInterface::class));
        }

        return $gateway;
    }

    /**
     * Make gateway instance.
     *
     * @param string $gateway
     * @param array  $config
     *
     * @return \Sms\Contracts\GatewayInterface
     *
     * @throws \Sms\Exceptions\InvalidArgumentException
     */
    protected function makeGateway($gateway, $config)
    {
        if (!\class_exists($gateway) || !\in_array(GatewayInterface::class, \class_implements($gateway))) {
            throw new InvalidArgumentException(\sprintf('Class "%s" is a invalid easy-sms gateway.', $gateway));
        }

        return new $gateway($config);
    }

    /**
     * Format gateway name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function formatGatewayClassName($name)
    {
        if (\class_exists($name) && \in_array(GatewayInterface::class, \class_implements($name))) {
            return $name;
        }

        $name = \ucfirst(\str_replace(['-', '_', ''], '', $name));

        return __NAMESPACE__."\\Gateways\\{$name}Gateway";
    }

    /**
     * Call a custom gateway creator.
     *
     * @param string $gateway
     * @param array  $config
     *
     * @return mixed
     */
    protected function callCustomCreator($gateway, $config)
    {
        return \call_user_func($this->customCreators[$gateway], $config);
    }

    /**
     * @param string|\Sms\Contracts\PhoneNumberInterface $number
     *
     * @return \Sms\Contracts\PhoneNumberInterface|string
     */
    protected function formatPhoneNumber($number)
    {
        if ($number instanceof PhoneNumberInterface) {
            return $number;
        }

        return new PhoneNumber(\trim($number));
    }

    /**
     * @param array|string|\Sms\Contracts\MessageInterface $message
     *
     * @return \Sms\Contracts\MessageInterface
     */
    protected function formatMessage($message)
    {
        if (!($message instanceof MessageInterface)) {
            if (!\is_array($message)) {
                $message = [
                    'content' => $message,
                    'template' => $message,
                ];
            }

            $message = new Message($message);
        }

        return $message;
    }

    /**
     * @param array $gateways
     *
     * @return array
     *
     * @throws \Sms\Exceptions\InvalidArgumentException
     */
    protected function formatGateways(array $gateways)
    {
        $formatted = [];

        foreach ($gateways as $gateway => $setting) {
            if (\is_int($gateway) && \is_string($setting)) {
                $gateway = $setting;
                $setting = [];
            }

            $formatted[$gateway] = $setting;
            $globalSettings = $this->config->get("gateways.{$gateway}", []);

            if (\is_string($gateway) && !empty($globalSettings) && \is_array($setting)) {
                $formatted[$gateway] = new Config(\array_merge($globalSettings, $setting));
            }
        }

        $result = [];

        foreach ($this->strategy()->apply($formatted) as $name) {
            $result[$name] = $formatted[$name];
        }

        return $result;
    }
}
