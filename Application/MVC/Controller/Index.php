<?php
    namespace MVC\Controller;
    
    use Attw\Controller\AbstractController;
    use Attw\Logger\FileLogger;
    use Attw\Logger\LogLevel;

    class Index extends AbstractController{
        public function index(){
            $this->render( 'index.html' );
            FileLogger::setFile( 'public/logs.txt' );
            FileLogger::write( LogLevel::ALERT, 'Controller: Index Action: Index' );
        }
    }
