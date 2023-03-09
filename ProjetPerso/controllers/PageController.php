<?php 


class PageController extends AbstractController {
    private  pageController $pageController;
    
    public function __construct(){
        
    }
    
    // PUBLIC PAGE
    
    public function accueil(){
        $this->publicRender("home", ["page accueil"]);
    }
    
    public function articles(){
        $this->publicRender("articles", ["page article"]);
    }
    
    public function contact(){
        $this->publicRender("contact", ["page contact"]);
    }
    
    public function playerProfil(){
        $this->publicRender("player_profil", ["page profil joueur"]);
    }
    
    public function teams(){
        $this->publicRender("teams", ["page teams"]);
    }
    
    public function effectif(){
        $this->publicRender("effectif", ["page effectif"]);
    }
    
    public function teamResume(){
        $this->publicRender("team_resume", ["page résumé equipe"]);
    }
    
    public function convocations(){
        $this->publicRender("convocations", ["convocations"]);
    }
}