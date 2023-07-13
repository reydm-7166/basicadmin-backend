<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return Inertia('Admin/Login');
    }

    public function attempt()
    {

    }

}
