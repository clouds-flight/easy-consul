<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:19:49
 * @LastEditTime: 2020-06-07 09:29:44
 * @FilePath: /easy-consul/src/api/Txn.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Txn extends AbstractApi
{
    public function txn($options)
    {
        return $this->client->doRequest('PUT','/v1/txn',$options);
    }
}