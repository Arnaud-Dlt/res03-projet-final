<?php 


class PageController extends AbstractController {
    private PlayerManager $playerManager;
    private TeamManager $teamManager;
    
    
    public function __construct(){
        $this->playerManager = new PlayerManager();
        $this->teamManager = new TeamManager();
    }
    
    // PUBLIC PAGE
    
    public function accueil(){
        $this->publicRender("home", []);
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
    
    public function articles(){
        $this->publicRender("articles", []);
    }
    
    public function contact(){
        $this->publicRender("contact", []);
    }
    
    public function teams(){
        $this->publicRender("teams", []);
    }
    
        public function effectif(){
            $this->publicRender("effectif", []);
        }
        
        public function playerProfil(){
            $this->publicRender("player_profil", []);
        }
        
        public function teamResume(){
            $this->publicRender("team_resume", []);
        }
    
        public function convocations(){
            $this->publicRender("convocations", []);
        }
        
    public function galerie(){
        $this->publicRender("galerie", []);
    }
    
    public function events(){
        $this->publicRender("events", []);
    }
}