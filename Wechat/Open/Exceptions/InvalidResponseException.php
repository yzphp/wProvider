<?php
namespace WeOpen\Exceptions;
use WeOpen\Contracts\DataError;
/**
 * 返回异常
 * Class InvalidResponseException
 * @package WeChat
 */
class InvalidResponseException extends \Exception
{
    /**
     * @var array
     */
    public $raw = [];

    /**
     * InvalidResponseException constructor.
     * @param string $message
     * @param integer $code
     * @param array $raw
     */
    public function __construct($message, $code = 0, $raw = [])
    {
        $message = isset(DataError::$message[$code]) ? DataError::$message[$code] : $message;
        parent::__construct($message, intval($code));
        $this->raw = $raw;
    }

}