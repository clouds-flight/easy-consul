<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 07:12:12
 * @LastEditTime: 2020-06-07 09:27:21
 * @FilePath: /easy-consul/src/ConfigInterface.php
 */ 

namespace Easy\Consul;



interface ConfigInterface
{
    public function get();
    public function set($config);
}
