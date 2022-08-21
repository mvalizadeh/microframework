<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $data = new \App\Models\User();
        $result = $data->get();
        $this->view('home.index', compact('result'));
    }

    public function edit()
    {
        global $request;
        echo "uid: " . $request->getRouteParams('id') . "<br>";
    }

    public function comment()
    {
        global $request;
        echo "cid: " . $request->getRouteParams('cid') . "<br>";
    }


    public function create()
    {
        echo "from create";
    }
}
