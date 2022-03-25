<?php
/**
 * User.php
 * 文件描述
 * created on 22:00 2022/3/25 22:00
 * create by xiflys
 */

namespace App\Models;

use EasySwoole\ORM\AbstractModel as AbstractModelAlias;

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
    protected $createTime = null;
    protected $updateTime = 'last_login_time';


}