<?php


namespace RmTop\StoreApi\core;


use RmTop\StoreApi\model\StoreConfigModel;
use think\console\command\Version;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

class TopStoreConfig
{


    /**
     * 创建配置
     *
     * @param string $apiUrl
     * @param string $appKey
     * @param string $version
     * @return StoreConfigModel|Model
     */
    static  function addConfig(string $apiUrl,string $appKey,string $version)
    {
        return StoreConfigModel::create([
            'config_text' => serialize(array('apiUrl'=>$apiUrl,'appKey'=>$appKey,'version'=>$version))
        ]);
    }

    /**
     * 更新配置
     * @param int $id
     * @param string $apiUrl
     * @param string $appKey
     * @param string $version
     * @return StoreConfigModel
     */
    static function editConfig(int $id,string $apiUrl,string $appKey,string $version): StoreConfigModel
    {
        return StoreConfigModel::where(['id' => $id])->update([
            'config_text' => serialize(array('apiUrl'=>$apiUrl,'appKey'=>$appKey,'version'=>$version))
        ]);
    }


    /**
     * @param int $id
     * @return bool
     * 删除配置
     */
    static function deleteConfig(int $id): bool
    {
        return StoreConfigModel::where(['id' => $id])->delete();

    }


    /**
     * 输出配置
     * @param int $id
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    static function getConfig(int $id)
    {
        $result =  StoreConfigModel::where(['id' => $id])->find();
        return unserialize($result['config_text']);
    }

}