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
        $this->publicRender("player_profil", []);
    }
    
    public function teamResume(){
        $this->publicRender("team_resume", []);
    }

    public function convocations(){
        $this->publicRender("convocations", []);
    }
}


?>