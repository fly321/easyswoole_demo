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
    function index()
    {
        $this->response()->write("hello_index");
    }

}