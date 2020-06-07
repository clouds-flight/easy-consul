<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 09:48:56
 * @LastEditTime: 2020-06-07 09:27:25
 * @FilePath: /easy-consul/src/ConfigObserver.php
 */ 

namespace Easy\Consul;

interface ConfigObserver
{
    public function update($old,$new);
}