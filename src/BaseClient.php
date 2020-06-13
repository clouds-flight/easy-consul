<?php
/*
 * @Author: 吴云祥
 * @Date: 2020-06-05 19:46:52
 * @LastEditTime: 2020-06-13 08:42:45
 * @FilePath: /thinkcmf5_1/vendor/clouds-flight/easy-consul/src/BaseClient.php
 */

namespace Easy\Consul;

use GuzzleHttp\Client as GuzzleHttpClient;

class BaseClient extends GuzzleHttpClient
{

    protected $clientConfig;

    protected $clientLog;

    public function __construct($options)
    {
        $options['http_errors'] = false;
        parent::__construct($options);
    }

    public function doRequest($method, $url, $options)
    {

        $response = null;

        //非指定uri，遍历配置的可选uri访问，直到成功
        if (empty($options['base_uri'])) {

            $i = 0;
            $result = false;

            foreach ($this->clientConfig->get() as $key => $consul) {

                $i = $key;

                try {

                    $options['base_uri'] = $consul['uri'];

                    if (!empty($consul['timeout'])) {
                        $options['timeout'] = $consul['timeout'];
                    }

                    if (!isset($options['headers']['X-Consul-Token']) && isset($consul['token']) && !empty($consul['token'])) {
                        $options['headers']['X-Consul-Token'] = $consul['token'];
                    }

                    $response = $this->request($method, $url, $options);

                    if (!empty($response)) {

                        $code = $response->getStatusCode();

                        if ($code == 200) {
                            //前面的consul访问失败，调整顺序

                            if ($key != 0) {
                                $new_config = $this->clientConfig->get();
                                $fail_consuls = array_splice($new_config, 0, $key);
                                $new_config = array_merge($new_config, $fail_consuls);
                                $this->clientConfig->set($new_config);
                            }

                            $result = true;
                        } else {
                            if ($this->clientLog != null) {
                                $this->clientLog->log(LogType::LOG, $options['base_uri'] . $url . '请求失败' . "\n" . 'error code : ' . $code . "\n" . 'content : ' . $response->getReasonPhrase());
                            }
                        }
                        break;
                    }
                } catch (\Exception $e) {
                    if ($this->clientLog != null) {
                        $this->clientLog->log(LogType::WARN, 'consul uri:' . $this->clientConfig->get()[$i]['uri'] . $url . " 访问失败！\n" . $e->getMessage());
                    }
                }
            }

            //如果所有consul访问都失败
            if ($i == count($this->clientConfig->get()) - 1 && !$result) {
                if ($this->clientLog != null) {
                    $this->clientLog->log(LogType::ERROR, "无可用consul地址!");
                }
            }
        } else {
            //指定uri访问
            try {
                $response = $this->request($method, $url, $options);
                if (!empty($response)) {
                    $code = $response->getStatusCode();
                    if ($code != 200) {
                        if ($this->clientLog != null) {
                            $this->clientLog->log(LogType::LOG, $options['base_uri'] . $url . '请求失败' . "\n" . 'error code : ' . $code . "\n" . 'content : ' . $response->getReasonPhrase());
                        }
                    }
                }
            } catch (\Exception $e) {
                if ($this->clientLog != null) {
                    $this->clientLog->log(LogType::ERROR, 'consul uri:' . $options['base_uri'] . $url . " 访问失败！\n" . $e->getMessage());
                }
            }
        }
        return $response;
    }
}
