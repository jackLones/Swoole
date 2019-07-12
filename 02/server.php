<?php
/**
 * Created by PhpStorm.
 * User: Sixstar-Peter
 * Date: 2019/2/19
 * Time: 21:37
 */

//tcp协议
$server=new Swoole\Server("0.0.0.0",9800);   //创建server对象

$server->set([
    'worker_num'=>1, //设置进程
    'heartbeat_idle_time'=>10,//连接最大的空闲时间
    'heartbeat_check_interval'=>3 //服务器定时检查
]);

//监听事件,连接事件
$server->on('connect',function ($server,$fd){
    echo "新的连接进入:{$fd}".PHP_EOL;
});


//消息发送过来
$server->on('receive',function (swoole_server $server, int $fd, int $reactor_id, string $data){
    echo "消息发送过来:".$fd.PHP_EOL;

    //服务端
    //$server->send($fd,'我是服务端');
});

//消息关闭
$server->on('close',function (){
    echo "消息关闭".PHP_EOL;
});
//服务器开启
$server->start();

