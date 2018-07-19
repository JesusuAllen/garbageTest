<?php
/**
 * 配置文件操作类
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17/017
 * Time: 14:44
 */

namespace Core\GarbageFrameWork\Lib\Garbage;

class Config{

    //支持的配置文件目录路径
    public $configPathArr = [
        'app_config' => APP_CONFIG_PATH,
        'garbage_config' => GARBAGE_PATH . 'Config' . DS,
    ];

    public static $configArr = array();

    public function __construct(){

    }

    //加载默认的配置
    public function loadDefConfig(){

        $configPathArr = $this->configPathArr;

        if( is_array($configPathArr) && count($configPathArr) > 0 ){

            foreach ( $configPathArr as $cpk => $cpv ){

                $pathList = scandir($cpv);

                foreach ( $pathList as  $plk => $plv ){

                    if( !in_array($plv, array('.', '..')) ){
                        self::$configArr[$cpk][$plv] = loadConfig($cpv.$plv);
                    }
                }
            }
        }
    }


    public function config($field=null, $value=null){

        if( is_null($field) ) return self::$configArr;

        foreach ( self::$configArr as $cak => $cav ){

            foreach ( $cav as $k => $v ){

                if ( isset($v[$field]) ) {
                    if ( is_null($value) ){
                        //读
                        return $v[$field];
                    } else {
                        //TODO 写
                    }
                }
            }
        }

        p('未找到该配置项：'.$field);exit;




    }



}