<?php

class TeamController extends AbstractController{
    private PlayerManager $pm;
    private TeamManager $tm;
    
    public function __construct()
    {
        $this->pm = new PlayerManager();
        $this->tm = new TeamManager();
    }
    
    // PLAYERS
    
    public function showPlayers()
    {
        // get all the players from the manager
        $players=$this->pm->getAllPlayers();
        // render
        
        $playersTab = [];
        foreach($players as $player){
            $playerTab=$player->toArray();
            $playersTab[]=$playerTab;
        }
        $this->render($playersTab);
    }
    
    public function createPlayer(array $post)
    {
        // create the player in the manager
        $player=new Player(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
         // get the player from the manager
        $createPlayer = $this->pm->createplayer($player);
        // render the created player
        $createPlayerTab = $createPlayer->toArray();
        
        $this->render($createPlayerTab);
    }

    public function updatePlayer(array $post)
    {
        // update the player in the manager
        $player=new Player(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
        $updatePlayer = $this->pm->updateplayer($player);
        $updatePlayerTab = $updatePlayer->toArray();
        
        $this->render($updatePlayerTab);
        // render the updated player
    }

    public function deletePlayer(array $post)
    {
        // delete the player in the manager
        $deletePlayer=new Player(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
        $deletePlayer = $this->pm->deletePlayer($deletePlayer);
        $deletePlayerTab = $deletePlayer->toArray();
        
        $this->render($updatePlayerTab);
        // render the list of all players
    }
    
    // TEAMS
    
    public function showTeams()
    {
        // get all the players from the manager
        $teams=$this->tm->getAllTeams();
        // render
        
        $teamsTab = [];
        foreach($teams as $team){
            $teamTab=$team->toArray();
            $teamsTab[]=$teamTab;
        }
        $this->render($teamsTab);
    }
    
    public function createTeam(array $post)
    {
        // create the Team in the manager
        $team=new Team(null, $post['name'],$post['championship']);
         // get the Team from the manager
        $createTeam = $this->tm->createTeam($team);
        // render the created team
        $createTeamTab = $createTeam->toArray();
        
        $this->render($createTeamTab);
    }

    public function updateTeam(array $post)
    {
        // update the Team in the manager
        $team=new Team(null, $post['name'],$post['championship']);
        $updateTeam = $this->tm->updateTeam($team);
        $updateTeamTab = $updateTeam->toArray();
        
        $this->render($updateTeamTab);
        // render the updated Team
    }

    public function deleteTeam(array $post)
    {
        // delete the Team in the manager
        $deleteTeam=new Team(null, $post['name'],$post['championship']);
        $deleteTeam = $this->tm->deleteTeam($deleteTeam);
        $deleteTeamTab = $deleteTeam->toArray();
        
        $this->render($updateTeamTab);
        // render the list of all Teams
    }
}


?>