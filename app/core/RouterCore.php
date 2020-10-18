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
                }
            }
        }
    }
    private function executePost()
    {
    }
    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
}
