<?php


namespace RmTop\StoreApi\core;


use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use RmTop\StoreApi\lib\TopClient;

class TopStoreService
{

    /**
     * 万能请求接口
     * @param int $configId //配置项ID
     * @param string $action  //路由url
     * @param array $params // 请求参数
     * @return ResponseInterface
     * @throws GuzzleException
     */
     static   function getAlmightyRequest(int $configId,string $action,array $params): ResponseInterface
    {
        $reps = new TopClient();
        $reps->setConfigId($configId);
        $reps->setAction($action);
        $reps->setParams($params);
        return $reps->Client();
    }

}