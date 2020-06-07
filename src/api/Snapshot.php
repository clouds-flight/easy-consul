<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:18:27
 * @LastEditTime: 2020-06-07 09:29:35
 * @FilePath: /easy-consul/src/api/Snapshot.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Snapshot extends AbstractApi
{

    public function getSnapshot($options)
    {
        return $this->client->doRequest('GET','/v1/snapshot',$options);
    }

    public function putSnapshot($options)
    {
        return $this->client->doRequest('PUT','/v1/snapshot',$options);
    }
   

}