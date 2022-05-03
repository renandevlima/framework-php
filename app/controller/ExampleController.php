<?php

namespace Controller;

use Model\Example;

// use Model\Example;

class ExampleController
{
  public function index()
  {
    global $twig;
    $example = new Example;
    $example->setExample("This is an example message");

    $data = [
      "example" => $example->getExample()
    ];

    $template = $twig->load('example.html');
    return $template->render($data);
  }

  public function rest()
  {
    $example = new Example;
    $example->setExample("This is an example message");

    $response = [
      "status" => 1,
      "msg" => $example->getExample()
    ];

    // if all your code is rest, just return response
    die(json_encode($response, JSON_UNESCAPED_UNICODE));
  }


}
