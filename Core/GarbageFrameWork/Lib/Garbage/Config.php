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
    public $configPathArr = array(
        'app_config' => APP_CONFIG_PATH,
        'garbage_config' => GARBAGE_PATH . 'Config' . DS,
    );

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


    /**
     * 获取/修改配置文件字段
     * @param $field 字段名
     * @param $value 字段值
     * @return mixed
     */
    public function config($field=null, $value=null){

        if( is_null($field) ) return self::$configArr;

        foreach ( self::$configArr as $cak => $cav ){

            foreach ( $cav as $ck => $cv ){
                //配置中字段
                if ( isset($cv[$field]) ) {
                    if ( is_null($value) ){
                        //读
                        return $cv[$field];
                    } else {
                        //TODO 写
                        $res = self::writeConfig( $cak, $ck,  $field, $value );
                        return $res;
                    }
                }
            }
        }

        p('未找到该配置项：'.$field);exit;
    }


    public static function writeConfig( $configType, $configName, $field, $value ){

        self::$configArr[$configType][$configName][$field] = $value;

        return true;
    }

    /**
     * 这个先弃用
     * 真实写入配置文件
     * @param $configPath 配置文件路径
     * @param $configArr 配置文件内容数组
     * @param $field 字段名
     * @param $value 值
     * @return bool|int
     */
    public function realWriteConfig( $configPath, $configArr, $field, $value ){

        $configArr[$field] = $value;

        $configStr = '<?php return array(' . PHP_EOL;

        foreach ( $configArr as $cak => $cav ){

            $configStr .= '\'' . $cak . '\' => \'' . $cav .'\',' . PHP_EOL;

        }

        $configStr .= ');' . PHP_EOL;

        $res = file_put_contents($configPath, $configStr);

        return $res;
    }



}