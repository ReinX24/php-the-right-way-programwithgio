<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
    ) {
    }

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): bool|string
    {
        $viewPath = VIEW_PATH . "/" . $this->view . ".php";

        // Checking if the view file exists
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        extract($this->params);

        // Rendering the php script in include file using output buffering,
        // this will return the contents as a string.
        ob_start();

        include $viewPath;

        return (string) ob_get_clean();
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}
