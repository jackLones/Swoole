<?php
/**
 * Created by PhpStorm.
 * User: Sixstar-Peter
 * Date: 2019/2/19
 * Time: 23:05
 */
 $client=new swoole\Client(SWOOLE_SOCK_UDP);
//（fd+id）识别身份
 //发数据
 $client->sendto('127.0.0.1',9800,"我是客户端");

 echo $client->recv(); //接收消息没有接收

 //22:01


