<?php

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public function render()
    {
        $viewPath = VIEW_PATH . "/" . $this->view . ".php";

        // Checking if the view file exists
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
            // TODO: resume at 10:06
        }

        // Rendering the php script in include file using output buffering,
        // this will return the contents as a string.
        ob_start();

        include $viewPath;

        return ob_get_clean();
    }
}
