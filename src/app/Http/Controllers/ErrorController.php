<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    function show($code = 404)
    {
        switch ($code) {
            case 403:
                return view('errors.' . $code);
                break;
            case 404:
                return view('errors.' . $code);
                break;
            default:
                return view('errors.404');
        }
    }
}
