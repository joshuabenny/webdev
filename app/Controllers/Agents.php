<?php

namespace App\Controllers;

class Agents extends BaseController
{
    public function index(): string
    {
        return view('agents.php');
    }
}