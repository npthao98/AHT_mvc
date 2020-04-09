<?php
namespace Core;

class Dispatcher
{
    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        if ($this->loadController() == "not found") {
            echo "Controller not found";
        } else {
            $controller = $this->loadController();
            $action = $this->request->action;
            if ($action == "") {
                $action = "index";
            }
            if (is_callable([$controller, $action])) {
                $controller->$action();
            } else {
                echo "Method $action not found";
            }
        }
    }

    public function loadController()
    {
        $name = 'Controllers\\'.$this->request->controller."Controller";
        if (class_exists($name)) {
            $controller = new $name();
            return $controller;
        } else {
            return "not found";
        }
    }
}
