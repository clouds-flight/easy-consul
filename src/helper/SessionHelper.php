<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 16:39:19
 * @LastEditTime: 2020-06-07 10:06:51
 * @FilePath: /easy-consul/src/helper/SessionHelper.php
 */ 

namespace Easy\Consul\Helper;

use Easy\Consul\ApiFactory;

class SessionHelper
{
    private $session;
    public $ns;
    public $lockDelay;
    public $node;
    public $name;
    public $checks;
    public $behavior;
    public $ttl;
    public $uuid;


    public function __construct()
    {
        $this->session = ApiFactory::api('Session');
    }

    private function encode()
    {
        $obj = [];
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $obj[$key] = $value;
            }
        }
        unset($obj['session']);
        unset($obj['uuid']);
        return $obj;
    }

    public function create()
    {
        $options['body'] = json_encode($this->encode());
        $response = $this->session->create($options);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            }
        }
        return false;
    }

    public function destroy()
    {
        $response = $this->session->putDestroyRest($this->uuid, []);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                if ($response->getBody() == "true") {
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    public function renew()
    {
        $response = $this->session->putRenewRest($this->uuid, []);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            } else {
                return false;
            }
        }
        return false;
    }

    public function get()
    {
        $response = $this->session->getInfoRest($this->uuid, []);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            } else {
                return false;
            }
        }
        return false;
    }

}
