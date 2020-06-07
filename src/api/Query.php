<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:20:30
 * @LastEditTime: 2020-06-07 09:29:26
 * @FilePath: /easy-consul/src/api/Query.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Query extends AbstractApi
{
    public function getQuery($options)
    {
        return $this->client->doRequest('GET','/v1/query',$options);
    }

    public function postQuery($options)
    {
        return $this->client->doRequest('POST','/v1/query',$options);
    }

    public function getQueryRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/query/'.$param,$options);
    }


    public function putQueryRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/query/'.$param,$options);
    }


    public function deleteQueryRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/query/'.$param,$options);
    }

}