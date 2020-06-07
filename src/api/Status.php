<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:17:15
 * @LastEditTime: 2020-06-07 09:29:40
 * @FilePath: /easy-consul/src/api/Status.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Status extends AbstractApi
{  
    public function leader($options)
    {
        return $this->client->doRequest('GET','/v1/status/leader',$options);
    }

    public function peers($options)
    {
        return $this->client->doRequest('GET','/v1/status/peers',$options);
    }

}
