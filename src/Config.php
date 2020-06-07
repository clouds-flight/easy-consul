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

    private $lock_file = "config.lock";

    private static $instance = null;

    private function __construct($config, $lock_file = null)
    {
        $this->config = $config;

        if (!empty($lock_file)) {
            $this->lock_file = $lock_file;
        }

        $this->fp = fopen($this->lock_file, "a+");
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
        if ($this->getLock()) {
            $old = $this->config;
            $this->config = $config;
            $this->releaseLock();
            $this->notify($old, $config);
            return true;
        }
        return false;
    }

    public function getLock()
    {

        if (flock($this->fp, LOCK_EX)) {  // 进行排它型锁定
            return true;
        } else {
            return false;
        }
    }

    public function releaseLock()
    {
        flock($this->fp, LOCK_UN);
    }

    public function attach(ConfigObserver $observer)
    {
        $this->getLock();
        $this->observers[] = $observer;
        $index = count($this->observers);
        $this->releaseLock();
        return $index;
    }

    public function detach($index)
    {
        $this->getLock();
        unset($this->observers[$index]);
        $this->releaseLock();
    }

    public function notify($old, $new)
    {
        foreach ($this->observers as $observer) {
            $observer->update($old, $new);
        }
    }
}
