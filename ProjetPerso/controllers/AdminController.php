<?php

class AdminController extends AbstractController {
    private AdminManager $um;

    public function __construct()
    {
        $this->um = new AdminManager();
    }

    public function getAdmins()
    {
        // get all the Admins from the manager
        $Admins=$this->um->getAllAdmins();
        // render
        
        $AdminsTab = [];
        foreach($Admins as $Admin){
            $AdminTab=$Admin->toArray();
            $AdminsTab[]=$AdminTab;
        }
        $this->render($AdminsTab);
    }

    public function getAdmin(string $get)
    {
        $id = intval($get);
         // get the Admin from the manager
        $Admin = $this->um->getAdminById($id);
        // either by email or by id
        
        $AdminTab = $Admin->toArray();

        // render
        $this->render($AdminTab);
    }

    public function createAdmin(array $post)
    {
        // create the Admin in the manager
        $newAdmin=new Admin(null, $post['Adminname'], $post['firstName'], $post['lastName'], $post['email']);
         // get the Admin from the manager
        $createAdmin = $this->um->createAdmin($newAdmin);
        // render the created Admin
        $createAdminTab = $createAdmin->toArray();
        
        $this->render($createAdminTab);
    }

    public function updateAdmin(array $post)
    {
        // update the Admin in the manager
        $newAdmin=new Admin(null, $post['Adminname'], $post['firstName'], $post['lastName'], $post['email']);
        $updateAdmin = $this->um->updateAdmin($newAdmin);
        $updateAdminTab = $updateAdmin->toArray();
        
        $this->render($updateAdminTab);
        // render the updated Admin
    }

    public function deleteAdmin(array $post)
    {
        // delete the Admin in the manager
        $deleteAdmin=new Admin(null, $post['Adminname'], $post['firstName'], $post['lastName'], $post['email']);
        $deleteAdmin = $this->um->deleteAdmin($deleteAdmin);
        $deleteAdminTab = $deleteAdmin->toArray();
        
        $this->render($updateAdminTab);
        // render the list of all Admins
    }
}