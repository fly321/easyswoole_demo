<?php
/**
 * Index.php
 * 文件描述
 * created on 23:39 2022/3/23 23:39
 * create by xiflys
 */

namespace App\HttpController\Main\Api\Hello;


use EasySwoole\Http\AbstractInterface\Controller;
use Swoole\Exception;

class Index extends Controller
{
    # 私有属性不会被释放
    private $userid;

    /**
     * Notes:当请求进入时执行
     * User: Fly
     * DateTime: 2022/3/23 23:57
     * @param string|null $action
     * @return bool|null
     */
    protected function onRequest(?string $action): ?bool
    {
        return parent::onRequest($action); // TODO: Change the autogenerated stub
    }


    /**
     * Notes: 回收变量
     * User: Fly
     * DateTime: 2022/3/23 23:52
     */
    protected function gc()
    {
        parent::gc(); // TODO: Change the autogenerated stub
        $this->userid = null;
    }

    function index()
    {
        var_dump($this->userid);
        $this->userid = 1;
        var_dump($this->userid);

        // $this->response()->write("hello_index");
    }

    function test(){
        throw new Exception("test exception!");
    }


    protected function onException(\Throwable $throwable): void
    {
        var_dump($throwable->getMessage());
        // parent::onException($throwable); // TODO: Change the autogenerated stub
    }


}