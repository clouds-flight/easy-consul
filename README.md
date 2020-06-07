# easy-consul

php封装的consul 完整新版 http api库，便捷的使用服务注册/发现、分布式锁、Kv存储

1.初始化配置

     $config =[
            [
               'uri' => 'http://32.65.89.36:8500/',   //consul地址
               'token' => '02f51f27-88c5-15d5-1669-219857377e28',  //若consul设置需要token，则需配置
               'timeout' => '3' //请求超时时间
            ],
            [
               'uri' => 'http://127.0.0.1:8500/',
               'token' => '02f51f27-88c5-15d5-1669-219857377e28',
               'timeout' => '3'
            ]
        ];
        
     ApiFactory::init($config);
     
     
     可配置多个consul地址，按先后顺序访问，若拒绝服务，将会使用后面的地址访问，并将不可访问的移到数组后面，触发配置更改事件，如需要对配置更改后进行其它处理（上报错误等），可通过实现ConfigObserver进行观察
     如：
     
     class Observer implements ConfigObserver
    {
        public function update($old, $new)
        {
          echo "Observer : config update\n";
        }
     }
     
     $config =[
            [
               'uri' => 'http://32.65.89.36:8500/',   //consul地址
               'token' => '02f51f27-88c5-15d5-1669-219857377e28',  //若consul设置需要token，则需配置
               'timeout' => '3' //请求超时时间
            ],
            [
               'uri' => 'http://127.0.0.1:8500/',
               'token' => '02f51f27-88c5-15d5-1669-219857377e28',
               'timeout' => '3'
            ]
        ];
     
     ApiFactory::init($c, new Observer());
     
     
  2.服务注册与发现
  
     $service=new ServiceHelper();
     $service->id="test-server-1";
     $service->name="test-server";
     $service->address="127.0.0.1"; //服务ip地址
     $service->port=8000;  //服务端口
     $service->enableTagOverride=false;
     $service->check=[//健康检查
            'interval' => '3s', //健康检查间隔时间，每隔3s，调用一次上面的URL
            'timeout'  => '1s',
            'tcp' =>"127.0.0.1:80" 
     ];
     $service->register(); //注册服务
     $service->healthServiceByName(); //通过服务名称获取健康服务集合，只需设置name就可调用
     $service->service(); //通过服务id查找服务，只需设置id就可调用
     $service->services(); //所有服务，创建对象就可调用(可选参数filter，过滤服务，详情查看consul api 文档：https://www.consul.io/api-docs/agent/service)
     $service->deregister(); //取消注册，只需设置id就可调用
     
  3.Kv存储操作
    
    $kvHelper=new KvHelper();
    $kvHelper->key='test';
    $kvHelper->value='1';
    $kvHelper->put();  //创建
    $kvHelper->get();  //获取
    $kvHelper->value='2';
    $kvHelper->put();  //更新
    $kvHelper->delete(); //删除
     
  4.分布式锁
  
    $lock = new LockHelper('test-lock', '1', '10s', []);  参数：$key,$vaule,$ttl(有效时间,字符串),$checks(健康检查id集合)
    $lock->lock(); //锁
    $lock->renewLock(); //延长锁时间
    $lock->unlock();  //释放锁
    
  5.其它api的使用
    
    因consul api 同一个访问路径有（delete put get post），等请求方式：
    1.只有一种请求方式的
     如： /agent/services 则为 Agent类下的services方法
    2.只有一种请求方式，路径是多层级的
     如： /v1/agent/check/register 则为 Agent 类下的 checkRegister方法，多层级的使用驼峰法命名
    3.多种请求方式的
     请求方式+路径命名（路径首字母大写）
    4.有多种请求方式的，Rest风格的（路径后面需要完整资源id等的，如 /agent/service/:service_id）
     则为 请求方式+路径命名（路径首字母大写)+Rest  
     如：/v1/agent/health/service/id/  Agent类下的 getHealthServiceIdRest 方法
  
  
    Rest结尾的函数有两个参数，第一个就是完善资源索引的后缀，第二个是option
    其它函数都只有一个参数option
    
    http请求使用的是GuzzleHttp，所以option参数就是GuzzleHttp doRequest的options参数，方便查看文档和灵活的使用
    中文文档：https://guzzle-cn.readthedocs.io/zh_CN/latest/
    
    函数返回值：
    consul http api 返回字符串 true/false ,改为返回 bool类型的true/false
    其它返回json 对象（即consul http api 返回json字符串解码）
    
    
    
  6.扩展
  
    LogType:
  
    class LogType  
    {
       const LOG=0;
       const WARN=1;
       const ERROR=2;
    }
    
    consul访问失败：WARN
    所有consul访问失败：ERROR
    
    不会抛异常
  
    LogInterface:
    
    interface LogInterface
    {
      public function log($type,$message);
    }
    
    
    可通过实现日志接口自定义日志的输出方式，或增加ERROR处理
    初始化
    ApiFactory::init($c, new Observer()，实现LogInterface的对象);
    
    
    ConfigInterface：
    
    interface ConfigInterface
    {
       public function get();
       public function set($config);
    }
    
    Config类适用在常驻内存模式下使用，对于web类型的，更改配置对其他请求不会生效，可实现ConfigInterface，初始化时传入
  
    
     
     
