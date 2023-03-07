<?php

require "controllers/AdminController.php";
require "controllers/ArticleController.php";
require "controllers/MediaController.php";
require "controllers/StaffController.php";

class Router {
    
    private AdminController $AdminControl;
    private ArticleController $ArticleController;
    private MediaController $MediaController;
    private PlayerController $PlayerController;

    public function __construct()
    {
        $this->AdminController = new AdminController();
        $this->ArticleController = new ArticleController();
        $this->MediaController = new MediaController();
        $this->PlayerController = new PlayerController();
    }
    
    function checkRoute(string $route) : void 
    {
        
    }
}


?>