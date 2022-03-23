<?php
/**
 * Index.php
 * 文件描述
 * created on 23:39 2022/3/23 23:39
 * create by xiflys
 */

namespace App\HttpController\Main\Api\Hello;


use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{
    # 私有属性不会被释放
    private $userid;
    function index()
    {
        /**
         * NULL
        int(1)
        int(1)
        int(1)
         */
        var_dump($this->userid);
        $this->userid = 1;
        var_dump($this->userid);

        // $this->response()->write("hello_index");
    }

}