<?php
/**
 * Created by PhpStorm.
 * User: Sixstar-Peter
 * Date: 2019/2/19
 * Time: 21:37
 */

//tcp协议
$server=new Swoole\Server("0.0.0.0",9800,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);   //创建server对象

$server->set([
    'worker_num'=>1, //设置进程
    'heartbeat_idle_time'=>10,//连接最大的空闲时间
    'heartbeat_check_interval'=>3 //服务器定时检查
]);

//客户端服务端没有任何联系
//制定地址跟端口，不关心消息是否发送成功
//心跳检测不能影响到客户端
//udp建立长连接

//监听事件,
$server->on('packet',function ($server,$data,$clientInfo){
        var_dump($data,$clientInfo);
        $server->sendto($clientInfo['address'],$clientInfo['port'],"服务端数据包");
});



//服务器开启
$server->start();

