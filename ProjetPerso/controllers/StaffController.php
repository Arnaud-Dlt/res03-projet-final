<?php

class StaffController extends AbstractController{
    private StaffManager $sm;
    
    public function __construct()
    {
        $this->sm = new StaffManager();
    }
    
    public function addStaff(array $post){
        
        if(isset($post["staffFirstname"]) && !empty($post["staffFirstname"])
            && isset($post["staffLastname"]) && !empty($post["staffLastname"])
            && isset($post["staffPhone"]) && !empty($post["staffPhone"])
            && isset($post["staffRole"]) && !empty($post["staffRole"])
            && isset($post["staffProfilImg"]) && !empty($post["staffProfilImg"])){
                
            $newStaff=new Staff($post['staffFirstname'],$post['staffLastname'],$post['staffPhone'],$post['staffRole'], $post["staffProfilImg"]);
            
            $this->sm->insertStaff($newStaff);
        }
    }
}
?>