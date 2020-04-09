<?php
namespace Core;

class Router
{
    public static function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/mvc/") {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $request->controller = $explode_url[0];
            $explode_action = explode('&', $explode_url[1]);
            $request->action = $explode_action[0];
            $request->params = array_slice($explode_url, 2);
        }
    }
}
