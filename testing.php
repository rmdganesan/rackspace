<?php 
require __DIR__ . '/vendor/autoload.php';
use App\Lib\RedisServer;
use App\Lib\MySQLDB;
$objRedisServer = new RedisServer('redis', '6379','rackspace');
$objRedisServer->runStatus();
$objRedisServer->loadUsersData(new MySQLDB('mysql', 'root','root','rackspace'));