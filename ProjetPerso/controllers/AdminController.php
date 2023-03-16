<?php

class AdminController extends AbstractController{
    
    private AdminManager $adminManager;
    private PlayerManager $playerManager;
    private StaffManager $staffManager;
    private CategoryManager $categoryManager;
    private TeamManager $teamManager;
    private ArticleManager $articleManager;
    
    public function __construct()
    {
        $this->adminManager = new AdminManager();
        $this->playerManager = new PlayerManager();
        $this->staffManager = new StaffManager();
        $this->categoryManager = new CategoryManager();
        $this->teamManager = new TeamManager();
        $this->articleManager = new ArticleManager();
    }
    
    
    public function adminHome(){
        $this->privateRender("admin-home", []);
    }
    
    public function adminPlayers(){
        $this->privateRender("admin-players", 
        ['players'=>$this->playerManager->getAllPlayers(),
        'category'=>$this->categoryManager->getAllCategories(),
        ]);
    }
    public function adminPlayersEdit(int $id, array $post){
        $this->privateRender("admin-player-edit", []);
        
        if(isset($post["editFirstname"]) && !empty($post["editFirstname"])
            && isset($post["editLastname"]) && !empty($post["editLastname"])
            && isset($post["editPhone"]) && !empty($post["editPhone"])
            && isset($post["editPosition"]) && !empty($post["editPosition"])
            && isset($post["editFoot"]) && !empty($post["editFoot"])
            && isset($post["editBio"]) && !empty($post["editBio"])){
                
            $newPlayer=new Player($post['editFirstname'],$post['editLastname'],$post['editPhone'],$post['editPosition'],$post['editFoot'],$post['editBio']);
            $newPlayer=setId($id);
            $this->playerManager->editPlayer($newPlayer);
        }
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
            
            $this->playerManager->insertPlayer($newPlayer);
        }
    }
    
    public function deletePlayer(int $id){
        $this->playerManager->deletePlayer($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-players");
    }
    
    public function adminTeams(){
        $this->privateRender("admin-teams", []);
    }
    public function adminTeamsEdit(){
            $this->privateRender("admin-team-edit", []);
        }
        
    public function adminConvoc(){
            $this->privateRender("admin-convocation", ['players'=>$this->playerManager->getAllPlayers()]);
        }
    
    public function adminArticles(){
        $this->privateRender("admin-posts", []);
    }
    public function adminArticleEdit(){
            $this->privateRender("admin-post-edit", []);
        }

    public function adminPhoto(){
        $this->privateRender("admin-pics", []);
    }
    
    public function adminStaff(){
        $this->privateRender("admin-staff", ['staff'=>$this->staffManager->getAllStaff()]);
    }
    public function adminStaffEdit(){
            $this->privateRender("admin-staff-edit", []);
        }
    
    public function adminRegister(array $post): void
    {   
        $this->privateRender("admin-register", []);
        
        if(isset($post["registerEmail"]) && !empty($post["registerEmail"])
            && isset($post["registerPassword"]) && !empty($post["registerPassword"])
            && isset($post["confirmPassword"]) && !empty($post["confirmPassword"])){
                
            if($post["registerPassword"] === $post["confirmPassword"]){
                
                $hashPwd=password_hash($post["registerPassword"], PASSWORD_DEFAULT);
                
                $newAdmin=new Admin($post['registerEmail'], $hashPwd);
                
                $this->adminManager->insertAdmin($newAdmin);
                
                header("Location: /res03-projet-final/ProjetPerso/admin");
            }
            else{
                echo "Les mots de passe sont différents !";
            }
        }
        else if(isset($post['registerEmail']) && empty($post['registerEmail'])){
            echo "Veuillez saisir un Email";
        }
        else if(isset($post['registerPassword']) && empty($post['registerPassword'])){
            echo "Veuillez saisir un mot de passe";
        }
        else if(isset($post['confirmPassword']) && empty($post['confirmPassword'])){
        echo "Veuillez confirmer votre mot de passe";
        }
    }

    public function login(array $post): void
    {
        
        if(isset($post['loginEmail'])&& !empty($post["loginEmail"]) 
        && isset($post['loginPassword']) && !empty($post["loginPassword"])){
            
            $logEmail=$post["loginEmail"];
            
            $pwd=$post["loginPassword"];
            
            $adminToConnect=$this->adminManager->getAdminByEmail($logEmail);
            var_dump($adminToConnect);
            $hashpwd=$adminToConnect->getPassword();
            
            if($adminToConnect !== null){
                var_dump("adminToConnect existe");
                if(password_verify($pwd, $hashpwd)){
                    $_SESSION["isConnected"] = true;
                    
                    header('Location: /res03-projet-final/ProjetPerso/admin');
                }
            
                else{
                    $this->publicRender("login", []);
                    echo "Identifiants inconnus";
                }
                
            }
            else{
                $this->publicRender("login", []);
            }
        }
        else{
            $this->publicRender("login", []);
            echo "Merci de compléter tous les champs";
        }
    }
    
    public function adminLogout(){
        session_destroy();
        header('Location: /res03-projet-final/ProjetPerso/');
    }
    
}


?>