<?php
/**
 * Created by PhpStorm.
 * User: Sixstar-Peter
 * Date: 2019/2/19
 * Time: 23:05
 */
 $client=new swoole\Client(SWOOLE_SOCK_TCP);
//（fd+id）识别身份
 //发数据
 $client->connect('127.0.0.1',9800);

 //约定一个分隔符

 //一次性发送多条数据
 for ($i=0;$i<10;$i++){
     $client->send("123456\r\n");
 }

//一次发送大量的数据，拆分小数据
//$data=str_repeat('a',12*1024*1024);
//$client->send(json_encode($data));

//echo $client->recv(); //接收消息没有接收

 //22:01


