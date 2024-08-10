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

    public function render(): string
    {
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';

        // var_dump($viewPath);
        // exit;

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        foreach ($this->params as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include $viewPath;

        return (string) ob_get_clean();
    }

    /**
     * This function is called when the view is returned
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * This function is called when a variable is loaded in the page using 
     * $this keyword.
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}
