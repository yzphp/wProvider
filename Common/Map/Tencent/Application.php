<?php

namespace wProvider\Map\Tencent;

use wProvider\Map\Tencent\Exception\FailException;
use GuzzleHttp\Client;

/**
 * 管理中心
 */
class Application
{
    /**
     * 当前版本
     */
    public const VERSION = '1.0';

    /**
     * guzzleHttp客户端
     * @var Client
     */
    protected $client;

    protected $key;

    /**
     * 默认配置
     * @var array
     */
    protected $default_config = [
        //基础域名
        'base_uri'=>'https://apis.map.qq.com/ws/',
        //是否进行ssl验证
        'verify'=>false,
        //请求超时的秒数
        'timeout'=>5.0,
    ];

    /**
     * @param string|null $key api请求所需要的key
     * @param array $config guzzleHttp Client客户端配置,传空使用默认配置
     * @throws FailException
     */
    public function __construct(?string $key=null,array $config=[])
    {
        if (empty($key)){
            throw new FailException('Configuration item key required');
        }
        $this->key = $key;
        $config = array_merge($this->default_config,$config);
        $this->client = new Client($config);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * 获取api请求类
     * @return Server
     */
    public function api()
    {
        return new Server(
            (new Request($this->key,$this->client))
        );
    }
}