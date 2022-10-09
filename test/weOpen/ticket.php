<?php
include "../include.php";
include "config.php";

try{

    // 实例公众号服务接口
    $server = new \WeOpen\Service($config);
    
    // 获取并更新Ticket推送
    if (!($data = $server->getComonentTicket())) {
        return "Ticket event handling failed.";
    }
    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo $e->getMessage() . PHP_EOL;

}