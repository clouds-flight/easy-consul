<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:03:33
 * @LastEditTime: 2020-06-07 09:29:10
 * @FilePath: /easy-consul/src/api/Health.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Health extends AbstractApi
{   
    public function getNodeRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/health/node/'.$param,$options);
    }

    public function getChecksRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/health/checks/'.$param,$options);
    }

    public function getStateRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/health/state/'.$param,$options);
    }


    public function getServiceRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/health/service/'.$param,$options);
    }

    public function getConnectRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/health/connect/'.$param,$options);
    }

}

