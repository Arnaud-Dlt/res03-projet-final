<?php

class Router {

    private ArticleController $articleController;
    private CategoryController $categoryController;
    private TeamController $teamController;
    private MediaController $mediaController;
    private StaffController $staffController;
    private PageController $pageController;
    private AdminController $adminController;

    public function __construct()
    {
        // $this->articleController = new ArticleController();
        // $this->categoryController = new CategoryController();
        $this->teamController = new TeamController();
        // $this->mediaController = new MediaController();
        // $this->staffController = new StaffController();
        $this->pageController = new PageController();
        $this->adminController = new AdminController();
    }

    function checkRoute() : void
    {
        $post=$_POST;
        
        if (!isset($_GET['path'])) {
            $this->pageController->accueil(); // Si pas de route , je redirige sur la homepage
        }

        else {

            $route = explode("/", $_GET['path']); // Je sépare tout ce qui se trouve entre les "/" pour les différentes routes

            // PAGES PUBLIQUES

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
                    $this->teamController->teams(); // Qui affichera la page des équipes du club
                }
                
                else if($route[1]=== "effectif"){
                    
                    if(!isset($route[2])){
                        $this->teamController->effectif(); // Qui affichera la page effectif du club
                    }
                    else if($route[2]=== "joueur"){
                        $this->teamController->playerProfil(); // Qui affichera la page fiche joueur
                    }
                }
                
                else if($route[1]=== "equipe"){
                    $this->teamController->teamResume(); // Qui affichera la page résumé d'une équipe sélectionnée
                }
            }
            
            else if($route[0]=== "convocations"){
                
                if(!isset($route[1])){
                    $this->teamController->convocations(); // Qui affichera la page des équipes du club
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
            
            else if($route[0]=== "contact"){
                
                if(!isset($route[1])){
                    $this->pageController->contact(); // Qui affichera la page contact du club
                }
            }
            else if($route[0]=== "login"){
                
                if(!isset($route[1])){
                    $this->pageController->login(); // Qui affichera la page contact du club
                }
            }
            
            // PAGE ADMIN
            
            else if($route[0]==="admin"){
                if(!isset($route[1])){
                    $this->adminController->adminHome(); // Qui affichera la page admin home
                }
                else if($route[1]==="register"){
                    $this->adminController->adminRegister($post);
                }
                
                else if($route[1]==="admin-players"){
                    
                    if(!isset($route[2])){
                        $this->adminController->adminPlayers(); // Qui affichera la page admin players
                    }
                    
                    else if($route[2]=== "admin-player-edit"){
                        $this->adminController->adminPlayersEdit(); // Qui affichera la page admin modif players
                    }
                }
                else if($route[1]==="admin-teams"){
                    
                    if(!isset($route[2])){
                        $this->adminController->adminTeams(); // Qui affichera la page admin teams
                    }
                    
                    else if($route[2]=== "admin-team-edit"){
                        $this->adminController->adminTeamsEdit(); // Qui affichera la page admin modif teams
                    }
                }
                else if($route[1]==="admin-posts"){
                    
                    if(!isset($route[2])){
                        $this->adminController->adminPosts(); // Qui affichera la page admin posts
                    }
                    
                    else if($route[2]=== "admin-post-edit"){
                        $this->adminController->adminPostEdit(); // Qui affichera la page admin modif post
                    }
                }
                else if($route[1]==="admin-staff"){
                    $this->adminController->adminPlayers();
                }
            }
            
            // SI RIEN NE RENTRE DANS LES CONDITIONS

            else {
                $this->pageController->error(); // J'affiche une page 404
            }


        }

    }
}