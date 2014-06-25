<?php
    namespace MVC\Controller;
    
    use Attw\Controller\AbstractController;

    class Index extends AbstractController{
        public function index(){
            $this->render( 'index.html' );
        }
    }
