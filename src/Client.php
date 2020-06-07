<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 11:42:53
 * @LastEditTime: 2020-06-07 09:27:08
 * @FilePath: /easy-consul/src/Client.php
 */ 

namespace Easy\Consul;


class Client extends BaseClient
{
    private static $instance = null;

    private function __construct($options)
    {
        parent::__construct($options);
    }

    public static function getInstance(ConfigInterface $config, LogInterface $log, $options)
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
