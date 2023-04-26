<?php

class TeamController extends AbstractController{
    private PlayerManager $playerManager;
    private TeamManager $teamManager;
    private CategoryManager $categoryManager;
    
    public function __construct()
    {
        $this->playerManager = new PlayerManager();
        $this->teamManager = new TeamManager();
        $this->categoryManager = new CategoryManager();
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
        $this->publicRender("player-profil", []);
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
            // si les champs sont rempli 
            
            // nouvelle instance
            $newPlayer=new Player($post['playerFirstname'],$post['playerLastname'],$post['playerPhone'],$post['playerBirthdate'],$post['playerPosition'],$post['playerFoot'],$post['playerBio'],$post['playerPics'],$post['playerCategory']);
            
            // créer joueur 
            $this->playerManager->createPlayer($newPlayer);
        }
    }
    
    public function updatePlayer(int $id, array $post){
        
        // recupération du l'id du joueur selectionné
        $displayPlayerToUpdate = $this->playerManager->getPlayerById($id);

        // stockage des infos du joueur
        $tab = [];
        $tab["player"] = $displayPlayerToUpdate;
        
        // affichage de la page avec les infos du joueurs pré-remplie dans le form
        $this->privateRender("admin-player-edit", $tab);
        
        if(isset($post["editFirstname"]) && !empty($post["editFirstname"])
            && isset($post["editLastname"]) && !empty($post["editLastname"])
            && isset($post["editPhone"]) && !empty($post["editPhone"])
            && isset($post["editBirthdate"]) && !empty($post["editBirthdate"])
            && isset($post["editPosition"]) && !empty($post["editPosition"])
            && isset($post["editFoot"]) && !empty($post["editFoot"])
            && isset($post["editBio"])
            && isset($post["editProfilImg"]) && !empty($post["editProfilImg"])
            && isset($post["editPlayerCategory"]) && !empty($post["editPlayerCategory"]))
            {
                $playerToUpdate = $this->playerManager->getPlayerById($id);
                
                $playerToUpdate= new Player($post['editFirstname'],$post['editLastname'],$post['editPhone'],$post['editBirthdate'],$post['editPosition'],$post['editFoot'],$post['editBio'],$post["editProfilImg"],$post["editPlayerCategory"]);
                
                $playerToUpdate->setId($id);
                
                $this->playerManager->updatePlayer($playerToUpdate);
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
    
    public function updateTeam(int $id, $post){
        
        // recupération du l'id de l'équipe selectionné
        $displayTeamToUpdate = $this->teamManager->getTeamById($id);
        
        // stockage des infos de l'équipe 
        $tab = [];
        $tab["team"] = $displayTeamToUpdate;
        $this->privateRender("admin-team-edit", $tab);

        if(isset($post["editTeamPicture"])
            && isset($post["editTeamName"]) && !empty($post["editTeamName"])
            && isset($post["editTeamCategory"]) && !empty($post["editTeamCategory"])){
            
            $teamToUpdate=new Team($post['editTeamName'],$post['editTeamPicture'],$post['editTeamCategory']);
            $teamToUpdate->setId($id);
            
            $this->teamManager->updateTeam($teamToUpdate);
            header("Location: /res03-projet-final/ProjetPerso/admin/admin-teams");
        }
    } 
    
    public function deleteTeam(int $id){
        $this->teamManager->deleteTeam($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-teams");
    }
}


?>