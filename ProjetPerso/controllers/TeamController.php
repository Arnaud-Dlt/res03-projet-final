<?php

class TeamController extends AbstractController{
    private PlayerManager $pm;
    private TeamManager $tm;
    
    public function __construct()
    {
        $this->pm = new PlayerManager();
        $this->tm = new TeamManager();
    }
    
}


?>