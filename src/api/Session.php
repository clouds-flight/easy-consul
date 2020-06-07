<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:14:48
 * @LastEditTime: 2020-06-07 09:29:30
 * @FilePath: /easy-consul/src/api/Session.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Session extends AbstractApi
{  
    public function create($options)
    {
        return $this->client->doRequest('PUT','/v1/session/create',$options);
    }

    public function putDestroyRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/session/destroy/'.$param,$options);
    }

    public function putRenewRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/session/renew/'.$param,$options);
    }

    public function getInfoRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/session/info/'.$param,$options);
    }

    public function getNodeRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/session/node/'.$param,$options);
    }

    public function list($options)
    {
        return $this->client->doRequest('GET','/v1/session/list',$options);
    }

}
