<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 11:05:58
 * @LastEditTime: 2020-06-07 16:13:47
 * @FilePath: /easy-consul/test/test.php
 */

namespace Test;

require __DIR__ . '/bootstrap.php';


use  Easy\Consul\Config;
use  Easy\Consul\ConfigObserver;
use  Easy\Consul\Log;
use  Easy\Consul\ApiFactory;
use  Easy\Consul\Helper\ServiceHelper;
use  Easy\Consul\Helper\KvHelper;
use  Easy\Consul\Helper\SessionHelper;
use  Easy\Consul\Helper\LockHelper;

$c =
    [

        [
            'uri' => 'http://32.65.89.36:8500/',
            'token' => '02f51f27-88c5-15d5-1669-219857377e28',
            'timeout' => '3'
        ],
        [
            'uri' => 'http://127.0.0.1:8500/',
            'token' => '02f51f27-88c5-15d5-1669-219857377e28',
            'timeout' => '3'
        ]

    ];


class Observer implements ConfigObserver
{
    public function update($old, $new)
    {
        echo "Observer : config update\n";
    }
}


ApiFactory::init($c, new Observer());

$lock = new LockHelper('test-lock', '1', '10s', []);
$lock->lock();

sleep(10);

$lock->renewLock();

$lock->unlock();



$service=new ServiceHelper();

$service->id="test-server-1";
$service->name="test-server";
$service->address="127.0.0.1";
$service->port=80;
$service->enableTagOverride=false;
$service->check=[
    'interval' => '3s', //健康检查间隔时间，每隔10s，调用一次上面的URL
    'timeout'  => '1s',
    'tcp' =>"127.0.0.1:80"
];


$service->register();

$service->healthServiceByName()[0];
$service->service();
$service->services();

sleep(5);

$service->deregister();


$sessionHelper=new SessionHelper();
$sessionHelper->lockDelay='15s';
$sessionHelper->name='my-service-lock';
$sessionHelper->ttl='30s';
$sessionHelper->Behavior='delete';

var_dump($sessionHelper->uuid=$sessionHelper->create()->ID);

var_dump($sessionHelper->get());

sleep(5);

$sessionHelper->renew();

$sessionHelper->get();

var_dump($sessionHelper->destroy());


$kvHelper=new KvHelper();
$kvHelper->key='test';
$kvHelper->value='1';
$kvHelper->acquire=$sessionHelper->uuid;

var_dump($kvHelper->put());

sleep(5);
$kvHelper->key='test';
var_dump($kvHelper->get());

sleep(60);



$kvHelper->value='1';
var_dump($kvHelper->put());


var_dump($kvHelper->delete());
