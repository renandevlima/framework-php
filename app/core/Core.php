<?php

namespace Core;

use Controller;

class Core
{
    private $url;
    private $controller = '';
    private $method = 'index';
    private $params = array();

    public function start($request)
    {
        if (isset($request['url'])) {
            $this->url = explode("/", $request['url']);

            $controllerName = ucfirst($this->url[0]);

            if ($controllerName) {
                $this->controller .= "controller\\{$controllerName}Controller";
            }

            array_shift($this->url);

            if (isset($this->url[0]) && $this->url != "") {
                $this->method = $this->url[0];
                array_shift($this->url);

                if (isset($this->url[0]) && $this->url != "") {
                    $this->params = $this->url;
                }
            }
        }

        if (empty($this->controller)) {
            $this->controller = "controller\\IndexController";
        }


        if (!class_exists($this->controller)) {
            $response = [
                "status" => 0,
                "msg" => "Access denied!"
            ];
            die(json_encode($response, JSON_UNESCAPED_UNICODE));
        }

        return call_user_func(array(new $this->controller, $this->method), $this->params);
    }
}
