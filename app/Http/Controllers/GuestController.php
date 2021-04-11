<?php

namespace App\Http\Controllers;

class GuestController
{   
    /**
    * Returning to view welcome blade. A SPA(Single Page Appliaction) that
    * will return all request from the server. It uses invokable function.
    * 
    */
    public function __invoke()
    {
        return view('welcome');
    }
}