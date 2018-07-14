<?php

namespace Core;

class View
{

    /**
     * @param string $view
     *
     * @return void
     */
    public static function render($view)
    {
        $file = "../App/Views/$view";

        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }
}