# rmsf-cloud-store-api

#### 安装插件

`composer require rmtop/rmsf-cloud-store-api
`
#### 发布插件相关文件 

`php think rmtop:publish_top_store
`
#### 数据迁移 自动创建配置数据库

`php think migrate:run
`

#### 相关执行方法


##### 配置项

```
addConfig(string $apiUrl,string $appKey,string $version)//创建配置

 editConfig(int $id,string $apiUrl,string $appKey,string $version) //更新配置

deleteConfig(int $id)

getConfig(int $id) //获取配置
```

#### 相关操作方法

万能请求接口

`
 return getAlmightyRequest(int $configId,string $action,array $params)
`

`参数解释:`
`$configId 创建配置项ID` <br>
`$action   执行方法  对应请求 地址URl 接口路由`<br>
`$params   请求相关接口所需要的参数`<br>

"参数样例："
```{
data:{
orderNoStr:"订单编号,多个订单用','隔开，一次性最多10个,"
apiCode:"助手编号"
}
url:"接口路由"
}
```



#### 完整请求案例

###### 店铺订单列表拉取


`$result =  new TopClient();`<br>
`$result->setConfigId(1);`<br>
`$result->setAction('wbc/gcso');`<br>
`$result->setParams(['sellerNick'=>"fdyxw11",'apiCode'=>'t4','ps'=>'20','pi'=>'1','startTime'=>"2021-05-31",'endTime'=>'2021-06-10','status'=>'']);`<br>
`$result = $result->Client();`<br>
