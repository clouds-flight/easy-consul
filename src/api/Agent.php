<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 17:16:46
 * @LastEditTime: 2020-06-07 09:28:26
 * @FilePath: /easy-consul/src/api/Agent.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Agent extends AbstractApi
{

    public function putTokenRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/token/'.$param,$options);
    }

    public function self($options)
    {
        return $this->client->doRequest('GET','/v1/agent/self',$options);
    }

    public function host($options)
    {
        return $this->client->doRequest('GET','/v1/agent/host',$options);
    }

    public function maintenance($options)
    {
        return $this->client->doRequest('PUT','/v1/agent/maintenance',$options);
    }

    public function reload($options)
    {
        return $this->client->doRequest('PUT','/v1/agent/reload',$options);
    }


    public function monitor($options)
    {
        return $this->client->doRequest('GET','/v1/agent/monitor',$options);
    }

    public function metrics($options)
    {
        return $this->client->doRequest('GET','/v1/agent/metrics',$options);
    }

    public function services($options)
    {
        return $this->client->doRequest('GET','/v1/agent/services',$options);
    }

    public function getServiceRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/agent/service/'.$param,$options);
    }

    public function checks($options)
    {
        return $this->client->doRequest('GET','/v1/agent/checks',$options);
    }


    public function members($options)
    {
        return $this->client->doRequest('GET','/v1/agent/members',$options);
    }

    public function putJoinRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/join/'.$param,$options);
    }

    public function leave($options)
    {
        return $this->client->doRequest('PUT','/v1/agent/leave',$options);
    }

    public function putForceLeaveRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/force-leave/'.$param,$options);
    }

    public function getHealthServiceIdRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/agent/health/service/id/'.$param,$options);
    }

    public function getHealthServiceNameRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/agent/health/service/name/'.$param,$options);
    }

    public function checkRegister($options)
    {
        return $this->client->doRequest('PUT','/v1/agent/check/register',$options);
    }

    public function putCheckDeregisterRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/check/deregister/'.$param,$options);
    }

    public function putCheckPassRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/check/pass/'.$param,$options);
    }

    public function putCheckWarnRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/check/warn/'.$param,$options);
    }

    public function putCheckFailRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/check/fail/'.$param,$options);
    }

    public function putCheckUpdateRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/check/update/'.$param,$options);
    }

    public function connectAuthorize($options)
    {
        return $this->client->doRequest('POST','/v1/agent/connect/authorize',$options);
    }

    public function connectCaRoots($options)
    {
        return $this->client->doRequest('GET','/v1/agent/connect/ca/roots',$options);
    }

    public function getConnectCaLeafRest($param,$options)
    {
        return $this->client->doRequest('GET','/v1/agent/connect/ca/leaf/'.$param,$options);
    }

    public function serviceRegister($options)
    {
        return $this->client->doRequest('PUT','/v1/agent/service/register',$options);
    }

    public function putServiceDeRegisterRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/service/deregister/'.$param,$options);
    }

    public function putServiceMaintenanceRest($param,$options)
    {
        return $this->client->doRequest('PUT','/v1/agent/service/maintenance/'.$param,$options);
    }

}
