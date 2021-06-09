<?php


namespace RmTop\StoreApi\lib;


use GuzzleHttp\Client;
use GuzzleHttp\Middleware;

class TopClient
{


    public string $api ;
    public string $version ;
    public string $appKey ;
    public string $action ;
    protected array $params;


    function Client(){
        $client = new Client();
        // Grab the client's handler instance.
        $clientHandler = $client->getConfig('handler');
        // Create a middleware that echoes parts of the request.
        $tapMiddleware = Middleware::tap(function ($request) {
        });
        $res = $client->request('POST', $this->api, [
            'http_errors' => false,
            'headers' => [ 'Accept' => 'application/json','User-Agent' => 'rmtop'],
            'handler' => $tapMiddleware($clientHandler),
            'json' => array_merge($this->getConfig(),['data'=>$this->params]),
        ]);
        $res['StatusCode'] = $res->getStatusCode();
        $res['ReasonPhrase'] = $res->getReasonPhrase();
        $res['content'] =json_decode($res->getBody(),true);
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
     * 设置参数
     * @param array $param
     */
    function setParams(array $param){
        $this->params = $param;
    }




    function Config(){

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