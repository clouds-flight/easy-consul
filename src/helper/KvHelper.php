<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 16:36:42
 * @LastEditTime: 2020-06-10 15:41:13
 * @FilePath: /thinkcmf5_1/vendor/clouds-flight/easy-consul/src/helper/KvHelper.php
 */ 

namespace Easy\Consul\Helper;

use Easy\Consul\ApiFactory;


class KvHelper
{
    private $kv;

    public $key;

    public $value;

    public $acquire;

    public $dc;

    public $flags;

    public $cas;

    public $release;

    public $ns;

    


    public function __construct()
    {
        $this->kv = ApiFactory::api('Kv');
    }

    private function encode()
    {
        $obj = [];
        foreach ($this as $key => $value) {
            if (!empty($value)) {
                $obj[$key] = $value;
            }
        }

        unset($obj['kv']);
        unset($obj['value']);

        return $obj;
    }


    public function put()
    {
   
        $options['query'] = $this->encode();
        $options['body'] = json_encode($this->value);
        $response = $this->kv->putKvRest($this->key, $options);
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

    public function get()
    {
        $response = $this->kv->getKvRest($this->key, []);
        if (!empty($response)) {
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody());
            }
        }

        return false;
    }

    public function delete()
    {
        $response = $this->kv->deleteKvRest($this->key, []);
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
}
