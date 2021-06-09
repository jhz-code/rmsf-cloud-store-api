<?php


namespace RmTop\StoreApi\core;


use RmTop\StoreApi\model\StoreConfigModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\Model;

class TopStoreConfig
{


    /**
     * 创建配置
     * @param array $data
     * @return StoreConfigModel|Model
     */
    static  function addConfig(array $data): StoreConfigModel|Model
    {
        return StoreConfigModel::create([
            'config_text' => serialize($data)
        ]);
    }

    /**
     * 更新配置
     * @param int $id
     * @param array $data
     * @return StoreConfigModel
     */
    static function editConfig(int $id, array $data): StoreConfigModel
    {
        return StoreConfigModel::where(['id' => $id])->update([
            'config_text' => serialize($data)
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
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    static function getConfig(int $id): mixed
    {
        $result =  StoreConfigModel::where(['id' => $id])->find();
        return unserialize($result['config_text']);
    }

}