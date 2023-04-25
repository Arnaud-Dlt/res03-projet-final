<?php 


class PageController extends AbstractController {
    private PlayerManager $playerManager;
    private TeamManager $teamManager;
    private ArticleManager $articleManager;
    
    
    public function __construct(){
        $this->playerManager = new PlayerManager();
        $this->teamManager = new TeamManager();
        $this->articleManager = new ArticleManager();
    }
    
    // PUBLIC PAGE
    
    public function accueil(){
        $this->publicRender("home", ['lastArticle'=>$this->articleManager->getLastArticles()]);
    }
    
    public function club(){
        $this->publicRender("club-presentation", []);
    }
        
        public function history(){
            $this->publicRender("club-history", []);
        }
        
        public function organigramme(){
            $this->publicRender("club-organigramme", []);
        }
        public function infrastructure(){
            $this->publicRender("club-infrastructure", []);
        }
     
    public function galerie(){
        $this->publicRender("galerie", []);
    }
    
    public function events(){
        $this->publicRender("events", []);
    }
    
    public function contact(){
        $this->publicRender("contact", []);
    }
    
    public function login(){
        $this->publicRender("login", []);
    }
    
    public function error(){
        $this->publicRender("404", []);
    }
}