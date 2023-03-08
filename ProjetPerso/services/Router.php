<?php

class Router {

    // private attribute

    private PageController $pageController;
    private ProductController $productController;

    // public constructor
    public function __construct()
    {

        $this->pageController = new PageController();
        $this->productController = new ProductController();

    }

    public function checkRoute(){

        if(isset($_GET["path"])){ // c'est l'url

            $route = explode("/",$_GET["path"]);

            // PageController
            if($route[0]=== "accueil"){
                $this->pageController->homepage();
                
            }
            else if($route[0]=== "le-club" && !isset($route[1])){
                $this->pageController->club();
                if($route[1]=== "histoire"){
                    $this->pageController->histoire();
                }
            }
            else if($route[0]=== "articles"){
                $this->pageController->news();
                
            }
            else if($route[0]=== "equipe"){
                $this->pageController->team();
                
            }
            else if($route[0]=== "galerie"){
                $this->pageController->galerie();
                
            }
            else if($route[0]=== "events"){
                $this->pageController->events();
                
            }
            else if($route[0]=== "contact"){
                $this->pageController->contact();
                
            }
            
        }
    }
}
?>