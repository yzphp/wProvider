<?php

// +----------------------------------------------------------------------
// | WeChatDeveloper
// +----------------------------------------------------------------------
// | 版权所有 2014~2022 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/WeChatDeveloper
// +----------------------------------------------------------------------

use WeChat\Contracts\DataArray;
use WeChat\Exceptions\InvalidInstanceException;

/**
 * 加载缓存器
 */
class We
{
    /**
     * 定义当前版本
     * @var string
     */
    const VERSION = '1.5.1';

    /**
     * 静态配置
     * @var DataArray
     */
    private static $config;

    /**
     * 设置及获取参数
     * @param array $option
     * @return array
     */
    public static function config($option = null)
    {
        if (is_array($option)) {
            self::$config = new DataArray($option);
        }
        if (self::$config instanceof DataArray) {
            return self::$config->get();
        }
        return [];
    }

    /**
     * 静态魔术加载方法
     * @param string $name 静态类名
     * @param array $arguments 参数集合
     * @return mixed
     * @throws InvalidInstanceException
     */
    public static function __callStatic($name, $arguments)
    {
        if (substr($name, 0, 4) === 'Tool') {
            $class = 'Tool\\' . substr($name, 4);
        } elseif (substr($name, 0, 6) === 'WeMini') {
            $class = 'WeMini\\' . substr($name, 6);
        } elseif (substr($name, 0, 6) === 'AliPay') {
            $class = 'AliPay\\' . substr($name, 6);
        } elseif (substr($name, 0, 7) === 'WePayV3') {
            $class = 'WePayV3\\' . substr($name, 7);
        } elseif (substr($name, 0, 5) === 'WePay') {
            $class = 'WePay\\' . substr($name, 5);
        }
        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
        throw new InvalidInstanceException("class {$name} not found");
    }

}
