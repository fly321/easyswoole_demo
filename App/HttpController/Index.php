<?php


namespace App\HttpController;


use App\Models\User;
use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\ORM\Exception\Exception;

class Index extends Controller
{

    public function index()
    {
        $file = EASYSWOOLE_ROOT.'/vendor/easyswoole/easyswoole/src/Resource/Http/welcome.html';
        if(!is_file($file)){
            $file = EASYSWOOLE_ROOT.'/src/Resource/Http/welcome.html';
        }
        $this->response()->write(file_get_contents($file));
    }

    public function get(){
        $user_model = new User();
        try {
            $cloumns = $user_model->schemaInfo()->getColumns();
            $this->writeJson(200,$cloumns);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function test()
    {
        $this->response()->write('this is test');
    }

    protected function actionNotFound(?string $action)
    {
        $this->response()->withStatus(404);
        $file = EASYSWOOLE_ROOT.'/vendor/easyswoole/easyswoole/src/Resource/Http/404.html';
        if(!is_file($file)){
            $file = EASYSWOOLE_ROOT.'/src/Resource/Http/404.html';
        }
        $this->response()->write(file_get_contents($file));
    }
}