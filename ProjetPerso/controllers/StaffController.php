<?php

class StaffController extends AbstractController{
    private StaffManager $staffManager;
    
    public function __construct()
    {
        $this->staffManager = new StaffManager();
    }
    
    public function addStaff(array $post){
        
        if(isset($post["staffFirstname"]) && !empty($post["staffFirstname"])
            && isset($post["staffLastname"]) && !empty($post["staffLastname"])
            && isset($post["staffPhone"]) && !empty($post["staffPhone"])
            && isset($post["staffRole"]) && !empty($post["staffRole"])
            && isset($post["staffProfilImg"]) && !empty($post["staffProfilImg"])){
                
            $newStaff=new Staff($post['staffFirstname'],$post['staffLastname'],$post['staffPhone'],$post['staffRole'], $post["staffProfilImg"]);
            
            $this->staffManager->insertStaff($newStaff);
        }
    }
    public function deleteStaff(int $id){
        $this->staffManager->deleteStaff($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-staff");
    }
}
?>