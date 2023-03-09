<?php

class Router {

    // private attribute
    private PageController $pm;
    

    // public constructor
    public function __construct()
    {
        $this->pageController = new PageController();
    }

    public function checkRoute($request){
        var_dump($request);
        $route = explode("/",$request);
        var_dump($route);
        
            if($route[1]=== ""){
                $this->pageController->accueil();
            }
            
            else if($route[1]=== "le-club"){
                $this->pageController->club();
                
                if($route[2]=== "histoire"){
                    $this->pageController->histoire();
                }
                
                else if($route[2]=== "organigramme"){
                    $this->pageController->organigramme();
                }
                
                else if($route[2]=== "infrastructure"){
                    $this->pageController->infrastructure();
                }
            }
            
            else if($route[1]=== "articles"){
                $this->pageController->articles();
                
                if($route[2]=== "articleid"){
                    $this->pageController->articleid();
                }
            }
            
            else if($route[1]=== "equipes"){
                $this->pageController->teams();
                
                // if($route[2]=== "senior1"){
                //     $this->pageController->senior1();
                    
                //     if($route[3]=== "resume-saison"){
                //         $this->pageController->résumé-saison();
                //     }
                    
                //     else if($route[3]=== "effectif"){
                //         $this->pageController->effectif();
                        
                //         if($route[4]=== "joueurid"){
                //             $this->pageController->joueurid();
                //         }
                //     }
                // }
                
                // if($route[2]=== "senior2"){
                //     $this->pageController->senior2();
                    
                //     if($route[3]=== "résumé-saison"){
                //         $this->pageController->résumé-saison();
                //     }
                    
                //     if($route[3]=== "effectif"){
                //         $this->pageController->effectif();
                        
                //         if($route[4]=== "joueurid"){
                //             $this->pageController->joueurid();
                //         }
                //     }
                // }
                
                // if($route[2]=== "veterans"){
                //     $this->pageController->veterans();
                    
                //     if($route[3]=== "résumé-saison"){
                //         $this->pageController->résumé-saison();
                //     }
                //     if($route[3]=== "effectif"){
                //         $this->pageController->effectif();
                        
                //         if($route[4]=== "joueurid"){
                //             $this->pageController->joueurid();
                //         }
                //     }
                // }
                
                // if($route[2]=== "jeunes"){
                //     $this->pageController->jeunes();
                    
                //     if($route[3]=== "résumé-saison"){
                //         $this->pageController->résumé-saison();
                //     }
                //     if($route[3]=== "effectif"){
                //         $this->pageController->effectif();
                        
                //         if($route[4]=== "joueurid"){
                //             $this->pageController->joueurid();
                //         }
                //     }
                // }
            }
            
            else if($route[1]=== "galerie"){
                $this->pageController->galerie();
                
                // if($route[2]=== "albumid"){
                //     $this->pageController->albumid();
                // }
                
            }
            
            else if($route[1]=== "events"){
                $this->pageController->events();
                
                // if($route[2]=== "repas"){
                //     $this->pageController->couscous();
                // }
                // else if($route[2]=== "fete-du-pont"){
                //     $this->pageController->paillote();
                // }
                
            }
            
            else if($route[1]=== "contact"){
                $this->pageController->contact();
            }
            
            else {
                echo "erreur 404";
            }
        
    }
}

?>