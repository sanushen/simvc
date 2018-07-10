<?php

namespace App\Controllers;

Class GalleryController extends \Core\Controller
{
    /**
     * @return void
     */
    public function index()
    {
        echo "Gallery index controller";
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
        echo '<p>Route parameters: <pre>' .
            htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}