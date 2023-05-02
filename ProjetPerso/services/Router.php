<?php

class Router {

    private ArticleController $articleController;
    private CategoryController $categoryController;
    private TeamController $teamController;
    private StaffController $staffController;
    private PageController $pageController;
    private AdminController $adminController;

    public function __construct()
    {
        $this->articleController = new ArticleController();
        $this->categoryController = new CategoryController();
        $this->teamController = new TeamController();
        $this->staffController = new StaffController();
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

            $route = explode("/", $_GET['path']); 
            
            // PAGES PUBLIQUES

            if ($route[0] === "le-club") {
                
                if(!isset($route[1])){
                    $this->pageController->club(); 
                }
                else if($route[1]=== "histoire"){
                    $this->pageController->history(); 
                }
                else if($route[1]=== "organigramme"){
                    $this->pageController->organigramme(); 
                }
                else if($route[1]=== "infrastructure"){
                    $this->pageController->infrastructure(); 
                }
            }
            
            else if($route[0] === "equipes"){
                
                if(!isset($route[1])){
                    // si pas de route après équipe, afficher page equipe
                    $this->teamController->teams(); 
                }
                
                else if($route[1] === "effectif"){
                    if(!isset($route[2])){
                        // si pas de route après effectif, afficher page effectif
                        $this->teamController->effectif(); 
                    }
                    else if($route[2] === "player-profil"){
                        if(isset($route[3]))
                        {
                            $this->teamController->playerProfil($route[3]);
                        }
                    }
                }

                else if($route[1]=== "résumé-saisonA"){
                    $this->teamController->teamResumeA($route[2]);
                }
                
                else if($route[1]=== "résumé-saisonB"){
                    $this->teamController->teamResumeB($route[2]);
                }
            }
            
            else if($route[0]=== "convocations"){
                
                if(!isset($route[1])){
                    $this->teamController->convocations(); // Qui affichera la page des équipes du club
                }
            }
            
            else if($route[0]=== "articles"){
                
                if(!isset($route[1])){
                        // si pas de route après articles, afficher page tous les articles
                        $this->articleController->articles(); 
                    }
                else if($route[1] === "single-article"){
                    if(isset($route[2]))
                    {
                        $this->articleController->singleArticle($route[2]);
                    }
                }
                
            }
            
            else if($route[0]=== "galerie"){
                
                if(!isset($route[1])){
                    $this->pageController->galerie(); // Qui affichera la page galerie du club
                }
                
            }
            
            else if($route[0]=== "events"){
                
                if(!isset($route[1])){
                    $this->pageController->events(); 
                }
            }
            
            else if($route[0]=== "contact"){
                
                if(!isset($route[1])){
                    $this->pageController->contact(); // Qui affichera la page contact du club
                }
            }
            
            else if($route[0]==="logout"){
                $this->adminController->adminLogout();
            }
            
            // PAGE ADMIN
            
            else if($route[0]==="admin"){
                
                if(isset($_SESSION["isConnected"]) && $_SESSION["isConnected"]===true){
                    
                    if(!isset($route[1])){
                        $this->adminController->adminHome(); 
                    }
                    
                    else if($route[1]=== "register"){
                        $this->adminController->adminRegister($post);
                    }
                    
                    else if($route[1]=== "admin-teams"){
                        
                        if(!isset($route[2])){
                            $this->adminController->adminTeams(); 
                            $this->teamController->addTeam($post);
                        }
                        
                        else if($route[2]=== "admin-team-edit"){
                            if(isset($route[3]))
                            {
                                $this->teamController->updateTeam($route[3], $post);
                            } 
                        }
                        else if($route[2]=== "admin-team-delete"){
                            if(isset($route[3])){
                                $this->teamController->deleteTeam($route[3]);
                            }
                        }
                    }
                    
                    else if($route[1]=== "admin-category"){
                        
                        if(!isset($route[2])){
                            $this->adminController->adminCategories(); // Qui affichera la page admin teams
                            $this->categoryController->addCategory($post);
                        }
                        
                        else if($route[2]=== "admin-category-edit"){
                            $this->categoryController->adminCategoryEdit(); // Qui affichera la page admin modif teams
                        }
                        else if($route[2]=== "admin-category-delete"){
                            if(isset($route[3])){
                                $this->categoryController->deleteCategory($route[3]);
                            }
                        }
                    }
                    
                    else if($route[1]=== "admin-players"){
                        
                        if(!isset($route[2])){
                            $this->adminController->adminPlayers(); 
                            $this->teamController->addPlayer($post);
                        }
                        else if($route[2]=== "admin-player-edit"){
                            if(isset($route[3]))
                            {
                                $this->teamController->updatePlayer($route[3], $post);
                            }
                        }
                        else if($route[2]=== "admin-player-delete"){
                            if(isset($route[3])){
                                $this->teamController->deletePlayer($route[3]);
                            }
                        }
                    }
                    
                    else if($route[1]=== "admin-staff"){
                        
                        if(!isset($route[2])){
                            $this->adminController->adminStaff(); 
                            $this->staffController->addStaff($post);
                        }
                        
                        else if($route[2]=== "admin-staff-edit"){
                            if(isset($route[3]))
                            {
                                $this->staffController->updateStaff($route[3], $post);
                            }
                        }
                        else if($route[2]=== "admin-staff-delete"){
                            if(isset($route[3])){
                                $this->staffController->deleteStaff($route[3]);
                            }
                        }
                    }
                    
                    else if($route[1]=== "admin-convocation"){
                            $this->adminController->adminConvoc(); // Qui affichera la page admin modif teams
                        }
                        
                    else if($route[1]=== "admin-posts"){
                        
                        if(!isset($route[2])){
                            $this->adminController->adminArticles(); 
                            $this->articleController->addArticle($post);
                        }
                        
                        else if($route[2]=== "admin-post-edit"){
                            if(isset($route[3])){
                                $this->articleController->updateArticle($route[3], $post);
                            }
                        }
                        else if($route[2]=== "admin-post-delete"){
                            if(isset($route[3])){
                                $this->articleController->deleteArticle($route[3]);
                            }
                        }
                    }
                    
                    else if($route[1]=== "admin-photo"){
                        $this->adminController->adminPhoto();
                    }
                    
                }
                
                else {
                    $this->adminController->login($post);
                }
            }
            
            //  404

            else {
                $this->pageController->error(); 
            }
        }
    }
}

