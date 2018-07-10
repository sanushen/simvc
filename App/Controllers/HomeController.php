<?php

namespace App\Controllers;

Class HomeController extends \Core\Controller
{
    /**
     * @return void
     */
    public function index()
    {
        echo "Welcome to the SIMVC controller.";
    }

    /**
     * @return void
     */
    public function posts()
    {
        echo "Welcome to the SIMVC controller - this is the posts action.";
    }

}