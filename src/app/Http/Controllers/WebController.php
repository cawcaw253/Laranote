<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function terms()
    {
        return view('terms-of-service');
    }

    public function privacy()
    {
        return view('privacy-policy');
    }
}
