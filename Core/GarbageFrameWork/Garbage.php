<?php
/**
 * 框架入口文件
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16/016
 * Time: 11:01
 */

//框架版本
const GARBAGE_V               = '1.0.0';
//类文件后缀
const CLASS_EXT               = '.php';
const DS                       = '/';

defined('GARBAGE_PATH')         or define('GARBAGE_PATH',  __DIR__ . DS);   //框架路径
defined('APP_PATH')             or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);   //应用路径
defined('APP_FILE_NAME')        or define('APP_FILE_NAME', 'Apps');   //应用路径
defined('APP_DEBUG')            or define('APP_DEBUG', false);  //是否开启调试
defined('LIB_PATH')             or define('LIB_PATH', realpath(GARBAGE_PATH . 'Lib') . DS);   //框架核心类库路径
defined('GARBAGE_CORE_PATH')   or define('GARBAGE_CORE_PATH', LIB_PATH . 'Garbage' . DS);   //Garbage类库目录

defined('APP_COMMON_NAME')      or define('APP_COMMON_NAME', 'Common');    //应用公共目录名
defined('APP_CONFIG_NAME')      or define('APP_CONFIG_NAME', 'Config');    //应用配置目录名
defined('APP_COMMON_PATH')      or define('APP_COMMON_PATH', APP_PATH . APP_COMMON_NAME . DS);   //应用公共目录
defined('APP_CONFIG_PATH')      or define('APP_CONFIG_PATH', APP_COMMON_PATH . APP_CONFIG_NAME . DS);    //应用配置目录
defined('APP_VIEW_NAME')        or define('APP_VIEW_NAME', 'View');    //应用视图名
defined('APP_CTRL_NAME')        or define('APP_CTRL_NAME', 'Ctrl');    //应用控制器名
//defined('APP_DEF_MODULE')       or define('APP_DEF_MODULE', 'Home');   //应用默认访问模块
//defined('APP_DEF_CTRL')         or define('APP_DEF_CTRL', 'Index');   //应用默认访问控制器
//defined('APP_DEF_FUNC')         or define('APP_DEF_FUNC', 'index');   //应用默认访问方法

//引入框架核心文件
require_once GARBAGE_CORE_PATH . 'App' . CLASS_EXT;


$app = new \Core\GarbageFrameWork\Lib\Garbage\App;
$app->run();