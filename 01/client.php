<?php
/**
 * Created by PhpStorm.
 * User: Sixstar-Peter
 * Date: 2019/2/19
 * Time: 23:05
 */
 $client=new swoole\Client(SWOOLE_SOCK_TCP,SWOOLE_SYNC);
 $client->connect('118.24.109.254',9800) || exit("连接失败");
  //（fd+id）识别身份
 //发数据
 $client->send("我是客户端");
 echo $client->recv(); //接收消息
 //关闭
 $client->close(); //


