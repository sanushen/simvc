<?php

namespace App\Controllers;

use \Core\View;

Class HomeController extends \Core\Controller
{
    /**
     * @return void
     */
    public function indexAction()
    {
        View::render('Home/index.php');
    }

    /**
     * @return void
     */
    public function posts()
    {
        echo "Welcome to the SIMVC controller - this is the posts action.";
    }

}