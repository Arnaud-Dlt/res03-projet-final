<?php

class TeamController extends AbstractController{
    private PlayerManager $playerManager;
    private TeamManager $teamManager;
    
    public function __construct()
    {
        $this->playerManager = new PlayerManager();
        $this->teamManager = new TeamManager();
    }
    
    // PUBLIC
    
    public function teams(){
        $this->publicRender("teams", ['teams'=>$this->teamManager->getAllTeams()]);
    }
    
    public function effectif(){
        $this->publicRender("effectif", 
        ['goalkeepers'=>$this->playerManager->getPlayersByPosition('gardien'),
        'defenders'=>$this->playerManager->getPlayersByPosition('défenseur'),
        'midfielders'=>$this->playerManager->getPlayersByPosition('milieu'),
        'strikers'=>$this->playerManager->getPlayersByPosition('attaquant')
        ]);
    }
    
    public function playerProfil(int $id){
        $this->publicRender("player-profil", ['player'=>$this->playerManager->getPlayerById()]);
        var_dump($data['player']);
    }
    
    public function teamResumeA(){
        $this->publicRender("team-resumeA", []);
    }
    public function teamResumeB(){
        $this->publicRender("team-resumeB", []);
    }

    public function convocations(){
        $this->publicRender("convocations", []);
    }
    
    
    // PRIVATE
    
    public function addPlayer(array $post){
        
        if(isset($post["playerFirstname"]) && !empty($post["playerFirstname"])
            && isset($post["playerLastname"]) && !empty($post["playerLastname"])
            && isset($post["playerPhone"]) && !empty($post["playerPhone"])
            && isset($post["playerBirthdate"]) && !empty($post["playerBirthdate"])
            && isset($post["playerPosition"]) && !empty($post["playerPosition"])
            && isset($post["playerFoot"]) && !empty($post["playerFoot"])
            && isset($post["playerBio"]) && !empty($post["playerBio"])){
                
            $newPlayer=new Player($post['playerFirstname'],$post['playerLastname'],$post['playerPhone'],$post['playerBirthdate'],$post['playerPosition'],$post['playerFoot'],$post['playerBio'],$post['playerPics'],$post['playerCategory']);
            
            $this->playerManager->createPlayer($newPlayer);
        }
    }
    
    public function updatePlayer(int $id, array $post)
    {
        $displayPlayerToUpdate = $this->playerManager->getPlayerById($id);
        
        $tab = [];
        
        $tab["player"] = $displayPlayerToUpdate;
        
        $this->privateRender("admin-player-edit", $tab);
        
        if(isset($post["editFirstname"]) && !empty($post["editFirstname"])
            && isset($post["editLastname"]) && !empty($post["editLastname"])
            && isset($post["editPhone"]) && !empty($post["editPhone"])
            && isset($post["editPosition"]) && !empty($post["editPosition"])
            && isset($post["editFoot"]) && !empty($post["editFoot"])
            && isset($post["editBio"]) && !empty($post["editBio"])
            && isset($post["editBirthdate"]) && !empty($post["editBirthdate"]))
            {
                $playerToUpdate = $this->playerManager->getPlayerById($id);
                
                $playerToUpdate= new Player($post['editFirstname'],$post['editLastname'],$post['editPhone'],$post['editPosition'],$post['editFoot'],$post['editBio'],$post['editBirthdate']);
                
                // $playerToUpdate->setFirstName($post['editFirstname']);
                // $playerToUpdate->setLastName($post['editLastname']);
                // $playerToUpdate->setPhone($post['editPhone']);
                // $playerToUpdate->setPosition($post['editPosition']);
                // $playerToUpdate->setFoot($post['editFoot']);
                // $playerToUpdate->setBio($post['editBio']);
                // $playerToUpdate->setBirthdate($post['editBirthdate']);
                
                
                $this->playerManager->updatePlayer($playerToUpdate);
                header("Location: /res03-projet-final/ProjetPerso/admin/admin-players");
            }
    }
    
    public function deletePlayer(int $id){
        $this->playerManager->deletePlayer($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-players");
    }
    
    public function addTeam(array $post){
        
        if(isset($post["teamName"]) && !empty($post["teamName"])
        && isset($post["teamPicture"]) && !empty($post["teamPicture"])
        && isset($post["teamCategory"]) && !empty($post["teamCategory"])){
                
            $newTeam= new Team($post['teamName'], $post['teamPicture'], $post["teamCategory"]);
            
            $this->teamManager->insertTeam($newTeam);
        }
    }
    public function editTeam(int $id, $post){
        $this->privateRender("admin-team-edit", []);
    } 
    public function deleteTeam(int $id){
        $this->teamManager->deleteTeam($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-teams");
    }
}


?>