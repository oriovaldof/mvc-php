<?php

namespace App\Core;

class RouterCore
{
    private $uri;
    private $method;
    private $getArr = [];

    public function __construct()
    {
        $this->initialize();
        require_once('../app/config/Router.php');
        $this->execute();
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $ex = explode('/', $uri);

        $uri = $this->normalizeURI($ex);

        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $uri = implode('/', $this->normalizeURI($uri));

        $this->uri = $uri;
        if (DEBUG_URI)
            dd($this->uri);
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function execute()
    {
        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':
                $this->executePost();
                break;
        }
    }
    private function executeGet()
    {
        foreach ($this->getArr as $get) {

            $router = substr($get['router'], 1);

            if(substr($router, -1) == '/'){
                $router = substr($router, 0, -1);
            }

            if ($router == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                break;
                }else{
                    $this->executeController($get['call']);
                }
            }
        }
    }
    private function executeController($get){
        $arParam = explode('@',$get);

        if(empty($arParam) || !isset($arParam[0]) || !isset($arParam[1]) ){
            (new \App\Controller\MessageController)->message('Dados Inválidos','Controller ou Metodo não encontrado'.$get);
            return;
        }

        $controller = 'App\\Controller\\'.$arParam[0];
        if(!class_exists($controller)){
            (new \App\Controller\MessageController)->message('Dados Inválidos','Controller não encontrado'.$get);
            return;
        }

        if(!method_exists($controller,$arParam[1])){
            (new \App\Controller\MessageController)->message('Dados Inválidos','Metodo não encontrado'.$get);
            return;
        }
        call_user_func_array([
            new $controller,
            $arParam[1]
        ],[]);
    }
    private function executePost()
    {
    }
    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
}
