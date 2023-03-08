<?php

abstract class AbstractController{
    
    public function publicRender(string $view, array $values) : void
    {
        $template = $view;
        $data = $values;
        require 'views/public_layout.phtml';
    }
    public function privateRender(string $view, array $values) : void
    {
        $template = $view;
        $data = $values;
        require 'views/admin_layout.phtml';
    }
    
}


?>