<?php 

/**
 * 系统函数库
 */



    /**
     * 打印函数
     * @param $var
     */
    // TODO  1.要输出的好看一些, 2.cli模式判断写的太丑了
    function p(){

        foreach ( func_get_args() as $k => $var ){
            if( !IS_CLI ) echo '<style> *{ font-size: 20px; } </style><pre>';

            if( is_array($var) || is_object($var) ){
                print_r($var);
            } else if( is_string($var) ) {
                echo $var;
            } else {
                var_dump($var);
            }

            if( !IS_CLI ) echo '<br /></pre>';
        }
    }

    /**
     * 获取输入参数(get/post)
     * @param string $fieldName 字段名
     * @param mixed $defVal 默认值
     * @param string $type 取值类型
     * @return mixed
     */
    function i( $fieldName, $defVal = null, $type='all' ){

        $fieldArr = array(
            'get'  => $_GET,
            'post' => $_POST,
            'all'  => $_GET + $_POST
        );

        if( !isset($fieldArr[$type][$fieldName]) ) {
            $fieldVal = $defVal;
        } else {
            $fieldVal = $fieldArr[$type][$fieldName];
            if( !$fieldVal && $fieldVal != 0 && $defVal != null ) $fieldVal = $defVal;
        }

        return $fieldVal;
    }


    /**
     * 获取/修改配置文件字段
     * @param $field 字段名
     * @param $value 字段值
     * @return mixed
     */
    function conf($field=null, $value=null){

        $config = new \Core\GarbageFrameWork\Lib\Garbage\Config();

        return $config->config($field, $value);
    }

    /**
     * 加载配置文件 支持格式转换 仅支持一级配置
     * @param string $file 配置文件名
     * @return array
     */
    function loadConfig($file){

        //获取文件后缀/扩展
        $ext  = pathinfo($file,PATHINFO_EXTENSION);

        switch($ext){
            case 'php':
                return include $file;
            default:
                p('目前仅支持加载.php的配置');
                return false;
        }
    }

