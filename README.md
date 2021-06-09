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
function addConfig(array $data) //创建配置

editConfig(int $id, array $data)

deleteConfig(int $id)

getConfig(int $id) //获取配置
```

#### 相关操作方法