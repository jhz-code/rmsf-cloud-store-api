<?php

namespace RmTop\StoreApi;

use RmTop\StoreApi\command\PublishStoreFile;
use think\Service;

/**
 */
class RmStoreApiService extends Service
{
    /**
     * Register service.
     *
     * @return void
     */
    public function register()
    {
        // 注册数据迁移服务
        $this->app->register(\think\migration\Service::class);
    }

    /**
     * Boot function.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands(['rmtop:publish_pay' => PublishStoreFile::class,]);
    }


}
