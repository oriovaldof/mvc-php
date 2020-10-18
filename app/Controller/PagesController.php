<?php

namespace App\Controller;

use App\Core\Controller;

class PagesController extends Controller
{

    public function home()
    {
        $this->load('home/main');
        // $this->load('home/main', [
        //     'nome' => 'Oriweb seta'
        // ]);
    }

    public function quemSomos()
    {
        $this->load('quem-somos/main');
    }
    public function cep()
    {
        $this->load('cep/main');
    }
    public function contato()
    {
        $this->load('contato/main');
    }
}
