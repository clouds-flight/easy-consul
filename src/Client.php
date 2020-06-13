<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 11:42:53
 * @LastEditTime: 2020-06-13 08:43:12
 * @FilePath: /thinkcmf5_1/vendor/clouds-flight/easy-consul/src/Client.php
 */ 

namespace Easy\Consul;


class Client extends BaseClient
{
    private static $instance = null;

    private function __construct($options)
    {
        parent::__construct($options);
    }

    public static function getInstance(ConfigInterface $config, LogInterface $log=null, $options)
    {
        if (null === static::$instance) {
            self::$instance = new self($options);
            self::$instance->clientConfig = $config;
            self::$instance->clientLog = $log;
        }
        return self::$instance;
    }

    private function __clone(){}
    private function __wakeup(){}
}
