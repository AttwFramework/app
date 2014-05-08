<?php
    namespace MVC\Controller;
    
    use Attw\Controller\AbstractController;

    class Index extends AbstractController{
        public function index(){
            $vars = [ 'message' => 'This message was puted here with <b>Smarty</b>.' ];
            $this->render( 'index.html', $vars );
        }
    }
