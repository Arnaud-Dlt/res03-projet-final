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
        ['players'=>$this->playerManager->playersOrderByName(),
        'category'=>$this->categoryManager->getAllCategories(),
        ]);
    }
    
    public function adminPlayerEdit(){
        $this->privateRender("admin-player-edit", []);
    }
    
    public function adminTeams(){
        $this->privateRender("admin-teams", 
        ['teams'=>$this->teamManager->getAllTeams(),
        'category'=>$this->categoryManager->getAllCategories()]);
    }
    
    public function adminTeamEdit(){
        $this->privateRender("admin-team-edit", []);
    }
    
    public function adminCategories(){
        $this->privateRender("admin-category", 
        ['categories'=>$this->categoryManager->getAllCategories()]);
    }
    
    public function adminConvoc(){
        if(isset($_POST["n°1"])){
            
            $data=[];
            $player=[];
            
            $data['dateMatch']=$_POST['dateMatch'];
            $data['lieuMatch']=$_POST['lieuMatch'];
            $data['equipeAdverse']=$_POST['equipeAdverse'];
            $data['rdvMatch']=$_POST['rdvMatch'];
            $data['lieuRdvMatch']=$_POST['lieuRdvMatch'];
            
            $player[]=$_POST['n°1'];
            $player[]=$_POST['n°2'];
            $player[]=$_POST['n°3'];
            $player[]=$_POST['n°4'];
            $player[]=$_POST['n°5'];
            $player[]=$_POST['n°6'];
            $player[]=$_POST['n°7'];
            $player[]=$_POST['n°8'];
            $player[]=$_POST['n°9'];
            $player[]=$_POST['n°10'];
            $player[]=$_POST['n°11'];
            $player[]=$_POST['n°12'];
            $player[]=$_POST['n°13'];
            $player[]=$_POST['n°14'];
            
            $data['listPlayers']=$player;
            
            json_encode($data);
            var_dump(json_encode($data));
            var_dump($data);
        }
            
            $this->privateRender("admin-convocation", ['players'=>$this->playerManager->playersOrderByName()]);
        }
    
    public function adminArticles(){
        $this->privateRender("admin-posts", ['articles'=>$this->articleManager->getAllArticles()]);
    }
    
    public function adminArticlesEdit(){
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
        // Render la page du form
        $this->privateRender("admin-register", []);
        
        if(isset($post["registerEmail"]) && !empty($post["registerEmail"])
            && isset($post["registerPassword"]) && !empty($post["registerPassword"])
            && isset($post["confirmPassword"]) && !empty($post["confirmPassword"])){
                // Si champ rempli
                
            if($post["registerPassword"] === $post["confirmPassword"]){
                // si password identique on crypte le password
                
                $hashPwd=password_hash($post["registerPassword"], PASSWORD_DEFAULT);
                
                // enregristrement du nouvel admin
                $newAdmin=new Admin($post['registerEmail'], $hashPwd);
                
                $this->adminManager->insertAdmin($newAdmin);
                
                header("Location: /res03-projet-final/ProjetPerso/admin");
            }
            else{
                // sinon, message d'erreur
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
            $hashpwd=$adminToConnect->getPassword();
            
            if($adminToConnect !== null){
                if(password_verify($pwd, $hashpwd)){
                    $_SESSION["isConnected"] = true;
                    
                    header('Location: /res03-projet-final/ProjetPerso/admin');
                }
            
                else{
                    echo "Mot de passe incorrect";
                    $this->publicRender("login", []);
                }
                
            }
            else{
                echo "Identifiants inconnus";
                header('Location: /res03-projet-final/ProjetPerso/login');
            }
        }
        else{
            $this->publicRender("login", []);
        }
    }
    
    public function adminLogout()
    {
        session_destroy();
        header('Location: /res03-projet-final/ProjetPerso/');
    }
    
}


?>