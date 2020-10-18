<?php

$this->get('/', function(){
    
    (new \App\Controller\TesteController)->index();
});
$this->get('/about/test', function(){
    echo 'Estou na about test!!';
});
$this->get('/Categoria', 'TesteController@seta');
