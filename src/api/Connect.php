<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 17:40:59
 * @LastEditTime: 2020-06-07 09:28:42
 * @FilePath: /easy-consul/src/api/Connect.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Connect extends AbstractApi
{
    public function getCaConfiguration($options)
    {
        return $this->client->doRequest('GET','/v1/connect/ca/configuration',$options);
    }

    public function putCaConfiguration($options)
    {
        return $this->client->doRequest('PUT','/v1/connect/ca/configuration',$options);
    }

    public function caRoots($options)
    {
        return $this->client->doRequest('GET','/v1/connect/ca/roots',$options);
    }

    public function getIntentions($options)
    {
        return $this->client->doRequest('GET','/v1/connect/intentions',$options);
    }

    public function postIntentions($options)
    {
        return $this->client->doRequest('POST','/v1/connect/intentions',$options);
    }

    public function intentionsMatch($options)
    {
        return $this->client->doRequest('GET','/v1/connect/intentions/match',$options);
    }

    public function intentionsCheck($options)
    {
        return $this->client->doRequest('GET','/v1/connect/intentions/check',$options);
    }

    public function getIntentionsRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/connect/intentions/'.$param,$options);
    }

    public function putIntentionsRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/connect/intentions/'.$param,$options);
    }

    public function deleteIntentionsRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/connect/intentions/'.$param,$options);
    }

}
