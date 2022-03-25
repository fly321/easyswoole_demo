<?php
/**
 * User.php
 * 文件描述
 * created on 22:00 2022/3/25 22:00
 * create by xiflys
 */

namespace App\Models;

use EasySwoole\ORM\AbstractModel as AbstractModelAlias;
use EasySwoole\ORM\Utility\Schema\Table;

/**
 * 用户模型
 * Class User
 * @package App\Model
 */
class User extends AbstractModelAlias
{
    # 连接名
    protected $connectionName = 'write';

    protected $tableName = 'users';

    protected $autoTimeStamp = true;
    protected $createTime = 'create_at';
    protected $updateTime = 'update_at';

    /*public function schemaInfo(bool $isCache = true): Table
    {
        $table = new Table($this->tableName);
        $table->colInt('id');
        $table->colInt('age');
        $table->colVarChar('username',255);
        $table->colVarChar('password',255);
        $table->colInt('create_at');
        $table->colInt('update_at');
        $table->colInt('test');
        return $table;
    }*/


}