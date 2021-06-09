<?php


namespace RmTop\StoreApi\command;


use RmTop\StoreApi\lib\PublishFile;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Exception;

class PublishStoreFile extends Command
{



    protected function configure()
    {
        $this->setName('rmtop:publish_top_store')
            ->setDescription('publish_top_store ');
    }


    /**
     * 执行数据
     * @param Input $input
     * @param Output $output
     * @return void
     */
    protected function execute(Input $input, Output $output)
    {

        try{
            PublishFile::PublishFileToSys($output);//发布文件
            $output->writeln("all publish successfully！");
        }catch (Exception $exception){
            $output->writeln($exception->getMessage());
        }

    }




}