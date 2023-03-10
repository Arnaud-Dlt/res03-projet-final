<?php

class AdminController extends AbstractController{
    
    public function __construct()
    {
        
    }
    
    
    public function adminHome(){
        $this->privateRender("admin-home", []);
    }
    
    public function adminPlayers(){
        $this->privateRender("effectif", []);
    }
    
    public function adminTeams(){
        $this->privateRender("player_profil", []);
    }
    
    public function adminArticles(){
        $this->privateRender("team_resume", []);
    }

    public function adminStaff(){
        $this->privateRender("convocations", []);
    }
}


?>