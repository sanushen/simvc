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
}