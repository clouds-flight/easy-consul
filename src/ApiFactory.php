<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 23:01:03
 * @LastEditTime: 2020-06-07 10:31:02
 * @FilePath: /easy-consul/src/ApiFactory.php
 */ 

namespace Easy\Consul;

use Easy\Consul\Api\Acl;
use Easy\Consul\Api\Agent;
use Easy\Consul\Api\Catalog;
use Easy\Consul\Api\Config;
use Easy\Consul\Api\Connect;
use Easy\Consul\Api\Coordinate;
use Easy\Consul\Api\DiscoveryChain;
use Easy\Consul\Api\Event;
use Easy\Consul\Api\Health;
use Easy\Consul\Api\Kv;
use Easy\Consul\Api\Operator;
use Easy\Consul\Api\Query;
use Easy\Consul\Api\Session;
use Easy\Consul\Api\Snapshot;
use Easy\Consul\Api\Status;
use Easy\Consul\Api\Txn;

use Easy\Consul\Config as ApiConfig;
use Easy\Consul\Log;

use Exception;

class ApiFactory
{
    private static $instance;

    private $client;

    public function __construct($cfg, ConfigObserver $observer = null, $log = null, $options = [])
    {
        $config = ApiConfig::getInstance($cfg);

        if ($observer != null) {
            $config->attach($observer);
        }

        if ($log == null) {
            $log = new Log();
        }

        $client = Client::getInstance($config, $log, $options);

        $this->client = $client;
        self::$instance = $this;
    }


    public static function api($name)
    {
        if (!empty(self::$instance)) {
            $full_name = '\\Easy\\Consul\\Api\\' . $name;
            return new $full_name(self::$instance->client);
        } else {
            throw new Exception("未实例化ApiFactory对象");
        }
    }
}
