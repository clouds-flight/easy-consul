<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:12:00
 * @LastEditTime: 2020-06-07 09:29:20
 * @FilePath: /easy-consul/src/api/Operator.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Operator extends AbstractApi
{   
    public function raftConfiguration($options)
    {
        return $this->client->doRequest('GET','/v1/operator/raft/configuration',$options);
    }

    public function raftPeer($options)
    {
        return $this->client->doRequest('DELETE','/v1/operator/raft/peer',$options);
    }

    public function getKeyring($options)
    {
        return $this->client->doRequest('GET','/v1/operator/keyring',$options);
    }

    public function postKeyring($options)
    {
        return $this->client->doRequest('POST','/v1/operator/keyring',$options);
    }

    public function putKeyring($options)
    {
        return $this->client->doRequest('PUT','/v1/operator/keyring',$options);
    }

    public function deleteKeyring($options)
    {
        return $this->client->doRequest('DELETE','/v1/operator/keyring',$options);
    }

    public function getAutopilotConfiguration($options)
    {
        return $this->client->doRequest('GET','/v1/operator/autopilot/configuration',$options);
    }

    public function putAutopilotConfiguration($options)
    {
        return $this->client->doRequest('PUT','/v1/operator/autopilot/configuration',$options);
    }

    public function autopilotHealth($options)
    {
        return $this->client->doRequest('GET','/v1/operator/autopilot/health',$options);
    }

}

