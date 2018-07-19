<?php
/**
 * 入口文件
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 10:32
 */

 
//设置编码
header("Content-type: text/html; charset=utf-8");

//检查是否是本框架支持的php版本
if( version_compare(PHP_VERSION,'5.6.0','<') ) exit('仅支持php5.6.0以上版本');

//系统调试设置
define('APP_DEBUG',true);

//应用目录设置
define('APP_PATH','./Apps/');
//框架目录设置
define('GARBAGE_PATH','./Core/GarbageFrameWork/');


$itemName = explode(dirname(dirname(__DIR__)), dirname(__DIR__));
define('ITEM_NAME', substr($itemName[1], 1));

//引入系统函数
require_once 'Core/GarbageFrameWork/Common/function.php';

//引入框架入口文件
require_once 'Core/GarbageFrameWork/Garbage.php';
