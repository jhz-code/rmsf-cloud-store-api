<?php


namespace RmTop\StoreApi\lib;


use GuzzleHttp\Client;

class RmClient
{


    function Client(){
        $client = new Client();
        $res = $client->request('GET', 'http://open.abggg.cn/openapi', [
            'data' => ['sellerNick'=>"XXXX", 'apiCode'=>'pass'],
            'appkey'=>'ifwuxhmxsw3gbfl6gskh9qv1',
            'version'=>'V1',
            'url'=>'wbc/vcsi'
        ]);
        echo $res->getStatusCode();
        echo $res->getHeader('content-type');
        echo $res->getBody();
    }



}