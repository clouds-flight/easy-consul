<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 18:01:49
 * @LastEditTime: 2020-06-07 09:29:05
 * @FilePath: /easy-consul/src/api/Event.php
 */ 

namespace Easy\Consul\Api;

use Easy\Consul\AbstractApi;

class Event extends AbstractApi
{
    public function list($options)
    {
        return $this->client->doRequest('PUT', '/v1/event/list', $options);
    }

    public function putFireRest($param, $options)
    {
        return $this->client->doRequest('GET', '/v1/event/fire/' . $param, $options);
    }
}
