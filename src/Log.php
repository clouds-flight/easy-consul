<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-06 07:15:54
 * @LastEditTime: 2020-06-07 10:30:29
 * @FilePath: /easy-consul/src/Log.php
 */ 

namespace Easy\Consul;



class Log  implements LogInterface
{

    private static $instance = null;

    public static function getInstance()
    {
        if (null === static::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function log($type,$message)
    {
        switch($type)
        {
            case LogType::LOG:
                echo "Easy Consul LOG:".$message."\n";
            break;
            case LogType::WARN:
                echo "Easy Consul WARN:".$message."\n";
            break;
            case LogType::ERROR:
                echo "Easy Consul ERROR:".$message."\n";
            break;
        }
    }

}