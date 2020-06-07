<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 17:57:33
 * @LastEditTime: 2020-06-07 09:28:52
 * @FilePath: /easy-consul/src/api/DiscoveryChain.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class DiscoveryChain extends AbstractApi
{

    public function getDiscoveryChainRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/discovery-chain/'.$param,$options);
    }

    public function putDiscoveryChainRest($param,$options)
    {
        return $this->client->doRequest('POST','/v1/discovery-chain/'.$param,$options);
    }

}