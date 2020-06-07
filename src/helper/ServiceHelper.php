<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 10:02:52
 * @LastEditTime: 2020-06-07 09:26:41
 * @FilePath: /easy-consul/src/helper/ServiceHelper.php
 */ 

namespace Easy\Consul\Helper;

use Easy\Consul\ApiFactory;

class ServiceHelper
{
    public $id;
    public $name;
    public $tags;
    public $address;
    public $meta;
    public $taggedAddresses;
    public $port;
    public $enableTagOverride;
    public $check;
    public $checks;
    public $kind;
    public $proxyDestination;
    public $proxy;
    public $expose;
    public $connect;
    public $weights;
    public $token;
    public $namespace;

    private $agent;

    public function __construct()
    {
        $this->agent = ApiFactory::api('Agent');
    }

    private function encode()
    {
        $obj = [];
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $obj[$key] = $value;
            }
        }
        unset($obj['agent']);
        return $obj;
    }


    public function services($filter = '')
    {
        $options = [];
        $options['query']['filter'] = $filter;
        $response = $this->agent->services($options);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            }
        }
        return false;
    }


    public function service()
    {
        $response = $this->agent->getServiceRest($this->id, null);

        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            }
        }
        return false;
    }


    public function healthServiceByName()
    {
        $health = ApiFactory::api('Health');
        $response = $health->getServiceRest($this->name, null);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            }
        }
        return false;
    }


    //注册
    public function register()
    {
        $options = [];
        $body = $this->encode();
        $options['body'] = json_encode($body);
        $response = $this->agent->serviceRegister($options);

        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return true;
            }
        }
        return false;
    }


    //取消注册
    public function deregister()
    {
        $response = $this->agent->putServiceDeRegisterRest($this->id, null);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return true;
            }
        }
        return false;
    }
}
