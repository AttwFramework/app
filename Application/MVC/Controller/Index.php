<?php
namespace MVC\Controller;

use Attw\Mvc\Controller\AbstractController;

class Index extends AbstractController
{
    public function index()
    {
        $this->render('index.html');
    }
}