<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 23:01:03
 * @LastEditTime: 2020-06-13 08:43:29
 * @FilePath: /thinkcmf5_1/vendor/clouds-flight/easy-consul/src/ApiFactory.php
 */ 

namespace Easy\Consul;

use Easy\Consul\Config as ApiConfig;
use Easy\Consul\Log;

use Exception;

class ApiFactory
{

    private static $client;

    public static function init($cfg, ConfigObserver $observer = null, $log = null, $options = [])
    {
        if(is_array($cfg))
        {
            $config = ApiConfig::getInstance($cfg);
        }else{
            $config=$cfg;
        }

        if ($observer != null) {
            $config->attach($observer);
        }

        self::$client = Client::getInstance($config, $log, $options);

    }


    public static function api($name)
    {
        if (!empty(self::$client)) {
            $full_name = '\\Easy\\Consul\\Api\\' . $name;
            return new $full_name(self::$client);
        } else {
            throw new Exception("未实例化ApiFactory对象");
        }
    }
}
