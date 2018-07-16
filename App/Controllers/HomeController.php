<?php

namespace App\Controllers;

use \Core\View;


Class HomeController extends \Core\Controller
{
    /**
     * @return void
     *
     * @throws \Exception
     */
    public function indexAction()
    {
        View::renderTemplate('Home/index.html.twig', ['title'=>'My MVC Framework']);
//        View::renderTemplate('Home/index.html.twig', ['title'=>'My MVC Framework']);
    }

    /**
     * @return void
     */
    public function posts()
    {
        echo "Welcome to the SIMVC controller - this is the posts action.";
    }

}