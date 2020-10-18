<?php

namespace App\Controller;

use App\Core\Controller;

class TesteController extends Controller
{
    public function index(){
        $this->load('home/main',[
            'nome' => 'Oriweb'
        ]);
    }
}
