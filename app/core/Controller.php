<?php

namespace App\Core;

class Controller
{
    protected function load(string $view, $param = []){
     
        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader('../app/view/')
        );
        $twig->addGlobal('BASE',BASE);
         echo $twig->render($view.'.twig.php',$param);
    }
}
