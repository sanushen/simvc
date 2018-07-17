<?php

namespace App\Controllers;

use \Core\View;

Class Gallery extends \Core\Controller
{
    /**
     * @return void
     *
     * @throws \Exception
     */
    public function indexAction()
    {
        View::renderTemplate('Gallery/index.html.twig');
    }

    /**
     * return void
     */
    public function addNew()
    {
        echo "Added a new action in the Gallery";
    }

    /**
     * Show the edit page
     *
     * @return void
     */
    public function edit()
    {
        echo 'Hello from the edit action in the Posts controller!';
    }
}