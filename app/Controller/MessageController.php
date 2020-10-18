<?php

namespace App\Controller;

use App\Core\Controller;

class MessageController extends Controller
{
    public function message(string $title = null, string $message = null, int $code = 404)
    {
        http_response_code($code);
        $this->load('message/main', [
            'title' => $title,
            'message' => $message
        ]);
    }
}
