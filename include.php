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

spl_autoload_register(function ($classname) {
    $pathname = __DIR__ . DIRECTORY_SEPARATOR;
    $filename = str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';
    if (file_exists($pathname . $filename)) {
        foreach (['Tool','Comon'] as $prefix) {
            if (stripos($classname, $prefix) === 0) {
                include $pathname . $filename;
                return true;
            }
        }
    }
    return false;
});