<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 07:12:22
 * @LastEditTime: 2020-06-07 09:27:47
 * @FilePath: /easy-consul/src/LogInterface.php
 */ 

namespace Easy\Consul;


interface LogInterface
{
    public function log($type,$message);
}