<?php
require_once('../vendor/autoload.php');
require_once('../app/functions/functions.php');

use App\Controller\TesteController;


(new App\Core\RouterCore());


$teste = new TesteController();
dd($teste->seta());