<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    // public function __construct(
    //     protected string $view,
    //     protected array $params = []
    // ) {
    // }

    public static function make(string $view, array $params = [])
    {
        $viewPath = VIEW_PATH . '/' . $view . '.php';
        $layoutPath = VIEW_PATH . '/_layout.php';

        // var_dump($viewPath);
        // exit;

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        extract($params); // Turns key value pairs into variables and values

        ob_start();

        include_once $viewPath;

        $content = ob_get_clean();

        include_once $layoutPath;
    }

    // public function render()
    // {
    //     $viewPath = VIEW_PATH . '/' . $this->view . '.php';
    //     $layoutPath = VIEW_PATH . '/_layout.php';

    // var_dump($viewPath);
    // exit;

    // if (!file_exists($viewPath)) {
    //     throw new ViewNotFoundException();
    // }

    // foreach ($this->params as $key => $value) {
    //     $$key = $value;
    // }

    //     extract($this->params);

    //     ob_start();

    //     include_once $viewPath;

    //     $content = ob_get_clean();

    //     include_once $layoutPath;

    // }

    /**
     * This function is called when the view is returned
     * @return string
     */
    // public function __toString(): string
    // {
    //     $this->render();
    // }

    /**
     * This function is called when a variable is loaded in the page using 
     * $this keyword.
     * @param string $name
     * @return mixed
     */
    // public function __get(string $name)
    // {
    //     return $this->params[$name] ?? null;
    // }
}
