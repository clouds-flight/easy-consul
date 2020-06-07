<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 19:18:26
 * @LastEditTime: 2020-06-07 09:26:50
 * @FilePath: /easy-consul/src/AbstractApi.php
 */ 

namespace Easy\Consul;

abstract class AbstractApi
{

    protected $client;

    public function __construct(BaseClient $client)
    {
        $this->client = $client;
    }
}
