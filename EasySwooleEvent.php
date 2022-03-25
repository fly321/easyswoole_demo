<?php


namespace EasySwoole\EasySwoole;


use EasySwoole\EasySwoole\AbstractInterface\Event;
use EasySwoole\EasySwoole\Swoole\EventRegister;
use EasySwoole\FileWatcher\FileWatcher;
use EasySwoole\FileWatcher\WatchRule;
use EasySwoole\ORM\Db\Config as ConfigAlias;
use EasySwoole\ORM\Db\Connection;
use EasySwoole\ORM\DbManager;


class EasySwooleEvent implements Event
{
    public static function initialize()
    {
        date_default_timezone_set('Asia/Shanghai');
    }

    public static function mainServerCreate(EventRegister $register)
    {
        static::mysqlClient();
        static::hotUpdate();
    }

    /**
     * Notes:mysql
     * User: Fly
     * DateTime: 2022/3/25 21:51
     */
    protected static function mysqlClient(){

        $config = new ConfigAlias();
        $config->setDatabase('bb');
        $config->setUser('bb');
        $config->setPassword('123456');
        $config->setHost('192.168.43.219');
        $config->setPort(3306);
        $config->setTimeout(15); // 超时时间

        // 设置指定连接名称 后期可通过连接名称操作不同的数据库
        DbManager::getInstance()->addConnection(new Connection($config),'write');
        DbManager::getInstance()->addConnection(new Connection($config),'read');
    }


    protected static function hotUpdate(){
        $watcher = new FileWatcher();
        $rule = new WatchRule(EASYSWOOLE_ROOT . "/App"); // 设置监控规则和监控目录
        $watcher->addRule($rule);
        $watcher->setOnChange(function () {
            Logger::getInstance()->info('file change ,reload!!!');
            ServerManager::getInstance()->getSwooleServer()->reload();
        });
        $watcher->attachServer(ServerManager::getInstance()->getSwooleServer());
    }

}