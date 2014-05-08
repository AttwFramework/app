<?php
    namespace MVC\Controller;
    
    use Attw\Controller\AbstractController;
    use Attw\View\Html\Element\Form;
    use Attw\HTTP\Request;
    use Attw\File\File;
    use Attw\File\Validator\Extension;
    use Attw\File\Uploader\Upload;

    class Index extends AbstractController{
        public function index(){
            $vars = [ 'message' => 'This message was puted here with <b>Smarty</b>.' ];
            $this->render( 'index.html', $vars );
        }
    }
