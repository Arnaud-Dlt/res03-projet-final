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
    
    public function updateStaff(int $id, array $post){
        
        // recupération du l'id du staff selectionné
        $displayStaffToUpdate = $this->staffManager->getStaffById($id);
        // stockage des infos du staff
        $tab = [];
        $tab["staff"] = $displayStaffToUpdate;
        $this->privateRender("admin-staff-edit", $tab);

        if(isset($post["editStaffFirstname"]) && !empty($post["editStaffFirstname"])
            && isset($post["editStaffLastname"]) && !empty($post["editStaffLastname"])
            && isset($post["editStaffPhone"]) && !empty($post["editStaffPhone"])
            && isset($post["editStaffRole"]) && !empty($post["editStaffRole"])
            && isset($post["editStaffProfilImg"]))
            {
            
            $staffToUpdate = $this->staffManager->getStaffById($id);
            
            $staffToUpdate=new Staff($post['editStaffFirstname'],$post['editStaffLastname'],$post['editStaffPhone'],$post['editStaffRole'], $post['editStaffProfilImg']);
            
            $staffToUpdate->setId($id);
            
            $this->staffManager->updateStaff($staffToUpdate);
            header("Location: /res03-projet-final/ProjetPerso/admin/admin-staff");

        }
    } 
    
    public function deleteStaff(int $id){
        $this->staffManager->deleteStaff($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-staff");
    }
}
?>