<?php

namespace vProvider\TencentMapApi;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use JetBrains\PhpStorm\Internal\TentativeType;

/**
 * 响应类
 */
class Response implements \ArrayAccess
{
    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;

    /**
     * @var array
     */
    protected $data;

    public function __construct(\GuzzleHttp\Psr7\Response $response)
    {
        $this->response = $response;
        $this->data = json_decode($this->rawData(),JSON_UNESCAPED_UNICODE);
    }

    protected function rawData()
    {
        return (string)$this->response->getBody();
    }

    /**
     * 获取数组
     * @return array
     */
    public function toArray():array
    {
        return $this->data['result'];
    }

    public function offsetExists($offset)
    {
        return empty($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->data[$offset]=$value;
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }
}