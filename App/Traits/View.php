<?php

namespace App\Traits;


trait View
{
    public static function view($uri,$data=[])
    {
        extract($data);
        $uri = str_replace('.', '/', $uri);
        require_once BASE_DIR . 'App/Views/' . $uri . '.php';
    }
}
