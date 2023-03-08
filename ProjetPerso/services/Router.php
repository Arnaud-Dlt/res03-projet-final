<?php

class Router {

    // private attribute

    private  ;

    // public constructor
    public function __construct()
    {
        $this-> = new ();
    }

    public function checkRoute(){

        if(isset($_GET["path"])){ 

            $route = explode("/",$_GET["path"]);

            if($route[0]=== "accueil"){
                $this->pageController->accueil();
                
            }
            
            else if($route[0]=== "le-club"){
                $this->pageController->club();
                
                if($route[1]=== "histoire"){
                    $this->pageController->histoire();
                }
                
                else if($route[1]=== "organigramme"){
                    $this->pageController->organigramme();
                }
                
                else if($route[1]=== "infrastructure"){
                    $this->pageController->infrastructure();
                }
            }
            
            else if($route[0]=== "articles"){
                $this->pageController->news();
                
                if($route[1]=== "articleid"){
                    $this->pageController->articleid();
                }
            }
            
            else if($route[0]=== "equipes"){
                $this->pageController->teams();
                
                if($route[1]=== "senior1"){
                    $this->pageController->senior1();
                    
                    if($route[2]=== "résumé-saison"){
                        $this->pageController->résumé-saison();
                    }
                    
                    else if($route[2]=== "effectif"){
                        $this->pageController->effectif();
                        
                        if($route[3]=== "joueurid"){
                            $this->pageController->joueurid();
                        }
                    }
                }
                
                if($route[1]=== "senior2"){
                    $this->pageController->senior2();
                    
                    if($route[2]=== "résumé-saison"){
                        $this->pageController->résumé-saison();
                    }
                    
                    if($route[2]=== "effectif"){
                        $this->pageController->effectif();
                        
                        if($route[3]=== "joueurid"){
                            $this->pageController->joueurid();
                        }
                    }
                }
                
                if($route[1]=== "veterans"){
                    $this->pageController->veterans();
                    
                    if($route[2]=== "résumé-saison"){
                        $this->pageController->résumé-saison();
                    }
                    if($route[2]=== "effectif"){
                        $this->pageController->effectif();
                        
                        if($route[3]=== "joueurid"){
                            $this->pageController->joueurid();
                        }
                    }
                }
                
                if($route[1]=== "jeunes"){
                    $this->pageController->jeunes();
                    
                    if($route[2]=== "résumé-saison"){
                        $this->pageController->résumé-saison();
                    }
                    if($route[2]=== "effectif"){
                        $this->pageController->effectif();
                        
                        if($route[3]=== "joueurid"){
                            $this->pageController->joueurid();
                        }
                    }
                }
            }
            
            else if($route[0]=== "galerie"){
                $this->pageController->galerie();
                
                if($route[1]=== "albumid"){
                    $this->pageController->albumid();
                }
                
            }
            
            else if($route[0]=== "events"){
                $this->pageController->events();
                
                if($route[1]=== "repas"){
                    $this->pageController->couscous();
                }
                else if($route[1]=== "fete-du-pont"){
                    $this->pageController->paillote();
                }
                
            }
            
            else if($route[0]=== "contact"){
                $this->pageController->contact();
                
            }
            
            else {
                $this->pageController->error();
            }
        }
    }
}

?>