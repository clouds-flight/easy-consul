<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-07 08:01:28
 * @LastEditTime: 2020-06-10 11:49:41
 * @FilePath: /pf-connection-server/vendor/clouds-flight/easy-consul/src/helper/LockHelper.php
 */

namespace Easy\Consul\Helper;

use Easy\Consul\ApiFactory;


class LockHelper
{

    private $key;
    private $value;
    private $ttl;
    private $sessionId;
    private $checks;



    public function __construct($key, $value = '', $ttl = '10s', $session_id = null, $checks = [])
    {
        $this->key = $key;
        $this->value = $value;
        $this->ttl = $ttl;
        $this->checks = $checks;
        $this->$sessionId = $session_id;
    }


    public function __destruct()
    {
        $this->unlock();
    }


    public function lock()
    {
        if ($this->sessionId == null) {
            $sessionHelper = new SessionHelper();
            $sessionHelper->name = $this->key;
            $sessionHelper->ttl = $this->ttl;
            $sessionHelper->behavior = 'delete';
            $sessionHelper->checks = $this->checks;
            $sessionHelper->lockDelay = '1s';
            $session = $sessionHelper->create();

            if ($session === false) {
                return false;
            }
            
            $this->sessionId = $session->ID;
        }


        $kvHelper = new KvHelper();
        $kvHelper->key = $this->key;
        $kvHelper->value = $this->value;
        $kvHelper->acquire = $this->sessionId;
        $res = $kvHelper->put();
        if ($res === true) {
            return true;
        }
        return false;
    }


    public function unlock()
    {
        $sessionHelper = new SessionHelper();
        $sessionHelper->uuid = $this->sessionId;
        $res = $sessionHelper->destroy();
        if ($res === true) {
            return true;
        }
        return false;
    }

    public function renewLock()
    {
        $sessionHelper = new SessionHelper();
        $sessionHelper->uuid = $this->sessionId;
        $res = $sessionHelper->renew();
        if ($res !== false) {
            return true;
        }
        return false;
    }
}
