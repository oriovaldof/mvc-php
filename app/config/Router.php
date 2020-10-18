<?php

$this->get('/', function(){
    echo 'Estou na Home 01!!';
});
$this->get('/home/', function(){
    echo 'Estou na Home!!';
});
$this->get('/about/test', function(){
    echo 'Estou na about test!!';
});
