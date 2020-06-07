<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 07:16:02
 * @LastEditTime: 2020-06-07 09:27:15
 * @FilePath: /easy-consul/src/Config.php
 */ 

namespace Easy\Consul;


class Config  implements ConfigInterface
{
    private $config = [];

    private $fp;

    private $observers = [];

    private static $instance = null;

    private function __construct($config)
    {
        $this->config = $config;
    }

    public static function getInstance($config, $lock_file = null)
    {
        if (null === static::$instance) {
            self::$instance = new self($config, $lock_file);
        }

        return self::$instance;
    }

    private function __clone(){}

    private function __wakeup(){}

    public function get()
    {
        return $this->config;
    }

    public function set($config)
    {
  
        $old = $this->config;
        $this->config = $config;
        $this->notify($old, $config);
           
    }

    public function attach(ConfigObserver $observer)
    {

        $this->observers[] = $observer;
        $index = count($this->observers);
        return $index;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify($old, $new)
    {
        foreach ($this->observers as $observer) {
            $observer->update($old, $new);
        }
    }
}
