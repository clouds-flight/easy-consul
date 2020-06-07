<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 17:38:52
 * @LastEditTime: 2020-06-07 09:28:37
 * @FilePath: /easy-consul/src/api/Config.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Config extends AbstractApi
{
    public function config($options)
    {
        return $this->client->doRequest('PUT','/v1/config',$options);
    }

    public function getConfigRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/config/'.$param,$options);
    }

    public function deleteConfigRest($param,$options)
    {
        return $this->client->doRequest('DELETE','/v1/config/'.$param,$options);
    }

}
