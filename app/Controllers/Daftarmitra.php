<?php

namespace App\Controllers;

class Daftarmitra extends BaseController
{
    public function index(): string
    {
       //  return view('welcome_message');
        return view ('mitra/daftarmitra');
       
    }
}
