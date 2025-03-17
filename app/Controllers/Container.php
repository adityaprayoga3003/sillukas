<?php

namespace App\Controllers;

class Container extends BaseController
{
    public function index()
    {
        $data = ['title' => 'tugas container'];
        return view('container/tugas2', $data);
    }
}
