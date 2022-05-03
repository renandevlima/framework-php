<?php

namespace Controller;


class IndexController
{
  public function index()
  {
    global $twig;
    $template = $twig->load('index.html');
    return $template->render();
  }

}
