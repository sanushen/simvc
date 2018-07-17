<?php

namespace App\Controllers;

use \Core\View;

Class Home extends \Core\Controller
{
    /**
     * @return void
     *
     * @throws \Exception
     */
    public function indexAction()
    {
        View::renderTemplate('Home/index.html.twig', ['title'=>'SIMVC']);
    }

    /**
     * @return void
     */
    public function posts()
    {
        echo "Welcome to the SIMVC controller - this is the posts action.";
    }

}