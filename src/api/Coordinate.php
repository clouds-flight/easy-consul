<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 17:45:50
 * @LastEditTime: 2020-06-07 09:28:47
 * @FilePath: /easy-consul/src/api/Coordinate.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Coordinate extends AbstractApi
{
    public function  datacenters($options)
    {
        return $this->client->doRequest('GET','/v1/coordinate/datacenters',$options);
    }

    public function  nodes($options)
    {
        return $this->client->doRequest('GET','/v1/coordinate/nodes',$options);
    }

    public function  getNodeRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/coordinate/node/'.$param,$options);
    }

    public function  update($options)
    {
        return $this->client->doRequest('PUT','/v1/coordinate/update',$options);
    }

}
