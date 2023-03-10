<?php

class Router {

    private ArticleController $articleController;
    private CategoryController $categoryController;
    private TeamController $teamController;
    private MediaController $mediaController;
    private StaffController $staffController;
    private PageController $pageController;

    public function __construct()
    {
        // $this->articleController = new ArticleController();
        // $this->categoryController = new CategoryController();
        // $this->teamController = new TeamController();
        // $this->mediaController = new MediaController();
        // $this->staffController = new StaffController();
        $this->pageController = new PageController();
    }

    function checkRoute() : void
    {

        if (!isset($_GET['path'])) {
            $this->pageController->accueil(); // Si pas de route , je redirige sur la homepage
        }

        else {

            $route = explode("/", $_GET['path']); // Je sépare tout ce qui se trouve entre les "/" pour les différentes routes

            //Pages publiques

            if ($route[0] === "le-club") {
                
                if(!isset($route[1])){
                    $this->pageController->club(); // Qui affichera la page club
                }
                else if($route[1]=== "histoire"){
                    $this->pageController->history(); // Qui affichera la page histoire du club
                }
                else if($route[1]=== "organigramme"){
                    $this->pageController->organigramme(); // Qui affichera la page organigramme du club
                }
                else if($route[1]=== "infrastructure"){
                    $this->pageController->infrastructure(); // Qui affichera la page infrastructure du club
                }
            }

            else if($route[0]=== "equipes"){
                
                if(!isset($route[1])){
                    $this->pageController->teams(); // Qui affichera la page des équipes du club
                }
                
                else if($route[1]=== "effectif"){
                    
                    if(!isset($route[2])){
                        $this->pageController->effectif(); // Qui affichera la page effectif du club
                    }
                    else if($route[2]=== "joueur"){
                        $this->pageController->playerProfil(); // Qui affichera la page fiche joueur
                    }
                }
                
                else if($route[1]=== "equipe"){
                    $this->pageController->teamResume(); // Qui affichera la page résumé d'une équipe sélectionnée
                }
            }
            
            else if($route[0]=== "convocations"){
                
                if(!isset($route[1])){
                    $this->pageController->convocations(); // Qui affichera la page des équipes du club
                }
            }
            
            else if($route[0]=== "articles"){
                
                if(!isset($route[1])){
                    $this->pageController->articles(); // Qui affichera la page des articles du club
                }
                
                else if($route[1]=== "articleId"){
                    
                }
            }
            
            else if($route[0]=== "galerie"){
                
                if(!isset($route[1])){
                    $this->pageController->galerie(); // Qui affichera la page galerie du club
                }
                
                else if($route[1]=== "albumId"){
                    
                }
            }
            
            else if($route[0]=== "events"){
                
                if(!isset($route[1])){
                    $this->pageController->events(); // Qui affichera la page des événements du club
                }
                
                else if($route[1]=== "repas"){
                    $this->pageController->events();
                }
                else if($route[1]=== "fete-du-pont"){
                    $this->pageController->events();
                }
            }

            // Si rien ne rentre dans les conditions

            else {
                $this->pageController->error(); // J'affiche une page 404
            }


        }

    }
}