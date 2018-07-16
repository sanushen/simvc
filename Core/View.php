<?php

namespace Core;


class View
{

    /**
     * @param string $view, array $args
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../App/Views/$view";

        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }

    /**
     * @param string $template
     * @param array $args
     *
     * @return void
     *
     * @throws \Exception
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader);
        }

        $temp = $twig->load($template);
        echo $twig->render($temp, $args);
    }
}