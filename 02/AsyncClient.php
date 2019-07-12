<?php
/**
 * Created by PhpStorm.
 * User: Sixstar-Peter
 * Date: 2019/2/19
 * Time: 23:05
 */
$client = new Swoole\Client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

//连接事件回调（必须注册所有事件）
$client->on("connect", function(swoole_client $cli){
    $cli->send("GET / HTTP/1.1\r\n\r\n");
    //sleep(5);
});

//异步回调客户端
$client->on("receive", function(swoole_client $cli, $data){
      echo "Receive: $data";
     //$cli->send(str_repeat('A', 100)."\n");

});

$client->on("error", function(swoole_client $cli){
    echo "error\n";
});


$client->on("close", function(swoole_client $cli){
      echo "Connection close\n";
});

$client->connect('127.0.0.1', 9800) || exit("");

//定时器,保持长连接
swoole_timer_tick(9000,function () use($client){
     $client->send('1');
});


echo "写日志";

echo "请求api接口";