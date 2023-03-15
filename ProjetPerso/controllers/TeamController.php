<?php

class TeamController extends AbstractController{
    private PlayerManager $pm;
    private TeamManager $tm;
    
    public function __construct()
    {
        $this->pm = new PlayerManager();
        $this->tm = new TeamManager();
    }
    
    
    public function teams(){
        $this->publicRender("teams", []);
    }
    
    public function effectif(){
        $this->publicRender("effectif", []);
    }
    
    public function playerProfil(){
        $this->publicRender("player-profil", []);
    }
    
    public function teamResume(){
        $this->publicRender("team-resume", []);
    }

    public function convocations(){
        $this->publicRender("convocations", []);
    }
    
    public function addPlayer(array $post){
        
        if(isset($post["playerFirstname"]) && !empty($post["playerFirstname"])
            && isset($post["playerLastname"]) && !empty($post["playerLastname"])
            && isset($post["playerPhone"]) && !empty($post["playerPhone"])
            && isset($post["playerBirthdate"]) && !empty($post["playerBirthdate"])
            && isset($post["playerPosition"]) && !empty($post["playerPosition"])
            && isset($post["playerFoot"]) && !empty($post["playerFoot"])
            && isset($post["playerBio"]) && !empty($post["playerBio"])){
                
            $newPlayer=new Player($post['playerFirstname'],$post['playerLastname'],$post['playerPhone'],$post['playerBirthdate'],$post['playerPosition'],$post['playerFoot'],$post['playerBio'],$post['playerPics'],$post['playerCategory']);
            
            $this->pm->insertPlayer($newPlayer);
        }
    }
}


?>