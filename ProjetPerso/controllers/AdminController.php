<?php

class AdminController extends AbstractController{
    
    private AdminManager $adminManager;
    
    public function __construct()
    {
        $this->adminManager = new AdminManager();
    }
    
    
    public function adminHome(){
        $this->privateRender("admin-home", []);
    }
    
    public function adminPlayers(){
        $this->privateRender("admin-players", []);
    }
        public function adminPlayersEdit(){
            $this->privateRender("admin-player-edit", []);
        }
    
    public function adminTeams(){
        $this->privateRender("admin-teams", []);
    }
        public function adminTeamsEdit(){
            $this->privateRender("admin-team-edit", []);
        }
        
        public function adminConvoc(){
            $this->privateRender("admin-convocation", []);
        }
    
    public function adminArticles(){
        $this->privateRender("admin-post", []);
    }
        public function adminArticleEdit(){
            $this->privateRender("admin-post-edit", []);
        }

    public function adminStaff(){
        $this->privateRender("admin-staff", []);
    }
        public function adminStaffEdit(){
            $this->privateRender("admin-staff-edit", []);
        }
    
    
    
    
    public function adminRegister(array $post): void
    {   
        if(empty($post)){
            $this->privateRender("admin-register",[]);
        }
        
        else{
            if(isset($post["registerEmail"]) && !empty($post["registerEmail"])
            && isset($post["registerPassword"]) && !empty($post["registerPassword"])
            && isset($post["confirmPassword"]) && !empty($post["confirmPassword"]))
            {
                if($post["registerPassword"] === $post["confirmPassword"]){
                    $hashPwd=password_hash($post["registerPassword"], PASSWORD_DEFAULT);
                    $newAdmin=new Admin($post['registerEmail'], $hashPwd);
                    $this->adminManager->insertAdmin($newAdmin);
                    $this->publicRender("login", []);
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
}
            
    
    public function login(array $post)
    {
        if(empty($post)){
            $this->publicRender("login", []);
        }
        else{
            if(isset($post['loginEmail'])&& !empty($post["loginEmail"]) 
            && isset($post['loginPassword']) && !empty($post["loginPassword"])){
                $logEmail=$post["loginEmail"];
                $pwd=$post["loginPassword"];
                $adminToConnect=$this->adminManager->getAdminByEmail($logEmail);
                
                if(password_verify($pwd, $adminToConnect->getPassword())){
                    $this->privateRender("admin-home", []);
                }
                else{
                    echo "Identifiants inconnus";
                }
            }
            else{
                echo "Merci de compléter tous les champs";
            }
        }
    }
}


?>