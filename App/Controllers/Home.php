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
        View::renderTemplate('Home/index.html', ['title'=>'SIMVC']);
    }
}