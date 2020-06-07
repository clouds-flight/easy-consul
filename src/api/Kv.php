<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:08:48
 * @LastEditTime: 2020-06-07 09:29:15
 * @FilePath: /easy-consul/src/api/Kv.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Kv extends AbstractApi
{   
    public function getKvRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/kv/'.$param,$options);
    }

    public function putKvRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/kv/'.$param,$options);
    }

    public function deleteKvRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/kv/'.$param,$options);
    }
}
