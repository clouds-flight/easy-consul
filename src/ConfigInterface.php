<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 07:12:12
 * @LastEditTime: 2020-06-07 15:49:52
 * @FilePath: /src/ConfigInterface.php
 */ 

namespace Easy\Consul;



interface ConfigInterface
{
    public function get();
    public function set($config);
    public function attach(ConfigObserver $observer);
    public function detach($index);
}
