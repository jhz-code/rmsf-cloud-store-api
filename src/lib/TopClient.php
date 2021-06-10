<?php


namespace RmTop\StoreApi\lib;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Middleware;
use RmTop\StoreApi\core\TopStoreConfig;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

class TopClient
{


    public string $api ;
    public string $version ;
    public string $appKey ;
    public string $action ;
    protected array $params;
    protected int $configId;


    /**
     * @throws ModelNotFoundException
     * @throws DbException
     * @throws DataNotFoundException
     */
    public function __construct()
    {

    }



    /**
     * @throws GuzzleException
     */
    function Client()
    {
        $this->Config();
        $client = new Client();
        // Grab the client's handler instance.
        $clientHandler = $client->getConfig('handler');
        // Create a middleware that echoes parts of the request.
        $tapMiddleware = Middleware::tap(function ($request) {
        });
        $result = $client->request('POST', $this->api, [
            'http_errors' => false,
            'headers' => [ 'Accept' => 'application/json','User-Agent' => 'rmtop'],
            'handler' => $tapMiddleware($clientHandler),
            'json' => array_merge($this->getConfig(),['data'=>$this->params]),
        ]);
        $res['StatusCode'] = $result->getStatusCode();
        $res['ReasonPhrase'] = $result->getReasonPhrase();
        $res['content'] =json_decode($result->getBody(),true);
        return $res ;
    }





    /**
     * @param string $apiUrl
     */
    function setApiUrl(string $apiUrl){
        $this->api = $apiUrl;
    }

    /**
     * @param string $version
     */
    function setVersion(string $version){
        $this->version = $version;
    }


    /**
     * @param string $appKey
     */
    function setAppKey(string $appKey){
        $this->appKey = $appKey;
    }


    /**
     * @param string $action
     * 设置
     */
    function setAction(string $action){
        $this->action = $action;
    }


    /**
     * 设置读取配置的ID
     * @param int $configId
     */
    function setConfigId(int $configId){
        $this->configId = $configId;
    }

    /**
     * 设置参数
     * @param array $param
     */
    function setParams(array $param){
        $this->params = $param;
    }


    /**
     * @throws ModelNotFoundException
     * @throws DataNotFoundException
     * @throws DbException
     */
    function Config(){
        $config = TopStoreConfig::getConfig($this->configId);
        if($config){
            $this->api = $config['apiUrl'];
            $this->appKey = $config['appKey'];
            $this->version =  $config['version'];
        }
    }





    /**
     * 获取配置项
     * @return array
     */
    function  getConfig(): array
    {
        return [
            'api'=>$this->api,
            'version'=>$this->version,
            'appKey'=>$this->appKey,
            'url' => $this->action
        ];
    }


}