<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }


    public function info(): string
    {
        return view('about');
    }

    public function about(): string
    {
        return view('aboutme');
    }

   
}
