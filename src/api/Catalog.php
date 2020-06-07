<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 17:34:08
 * @LastEditTime: 2020-06-07 09:28:32
 * @FilePath: /easy-consul/src/api/Catalog.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Catalog extends AbstractApi
{
    public function register($options)
    {
        return $this->client->doRequest('PUT','/v1/catalog/register',$options);
    }

    public function getConnectRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/catalog/connect/'.$param,$options);
    }

    public function deregister($options)
    {
        return $this->client->doRequest('PUT','/v1/catalog/deregister',$options);
    }

    public function datacenters($options)
    {
        return $this->client->doRequest('GET','/v1/catalog/datacenters',$options);
    }

    public function nodes($options)
    {
        return $this->client->doRequest('GET','/v1/catalog/nodes',$options);
    }

    public function services($options)
    {
        return $this->client->doRequest('GET','/v1/catalog/services',$options);
    }

    public function getServiceRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/catalog/service/'.$param,$options);
    }

    public function getNodeRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/catalog/node/'.$param,$options);
    }

    public function getNodeServicesRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/catalog/node-services/'.$param,$options);
    }

}
