<?php
include "../include.php";
include "config.php";

try{
    // 实例服务接口
    $open = new \WeOpen\MiniApp($config);

    // 查询最新一次提交的审核状态
    $list = $open->getAuthorizerList();
    var_export($list);

    //创建小程序任务状态
    // $list = $open->fastRegisterWeappCreate('佛山市海翰水族用品有限公司','91440604MA52YWC58K','1','haihansz','蒲建模','15687857888');
    // var_export($list);

    //查询创建小程序任务状态
    $list = $open->fastRegisterWeappSearch('佛山市海翰水族用品有限公司','haihansz','蒲建模');
    var_export($list);

    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo 'ERROR:'.$e->getMessage() . PHP_EOL;

}