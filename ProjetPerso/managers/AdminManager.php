<?php
class AdminManager extends AbstractManager{
    
    public function getAllAdmins() : array
    {
        $query=$this->db->prepare("SELECT * FROM admin");
        $query->execute();
        $getAllAdmins=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabAdmins=[];
        foreach($getAllAdmins as $admin){
            $object=new Admin($admin['id'], $admin['email'],$admin['password']);
            array_push($tabAdmins, $object);
        }
        var_dump($tabAdmins);
        return $tabAdmins;
    }
    
    public function getAdminById(int $id) : Admin
    {
        $query=$this->db->prepare("SELECT * FROM admin WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getAdminById=$query->fetch(PDO::FETCH_ASSOC);
        $newAdmin=new Admin($getAdminById['id'], $getAdminById['email'], $getAdminById['password']);
    
        return $newAdmin;
    }
    
    public function getAdminByEmail(string $email) : Admin
    {
        $query=$this->db->prepare("SELECT * FROM admin WHERE email= :email");
        $parameters= ['email' => $email];
        $query->execute($parameters);
        $getAdminByEmail=$query->fetch(PDO::FETCH_ASSOC);
        $newAdmin=new Admin($getAdminByEmail['email'],$getAdminByEmail['password']);
        
        $newAdmin->setId($getAdminByEmail["id"]);
        return $newAdmin;
    }
    
    public function insertAdmin(Admin $admin) : Admin
    {
        $query=$this->db->prepare("INSERT INTO admin VALUES (null, :email, :password)");
        $parameters= [
            'email' =>$admin->getEmail(),
            'password' => $admin->getPassword(),
            ];
        $query->execute($parameters);
    
        $getAdmin=$query->fetch(PDO::FETCH_ASSOC);
    
        return $admin;
    }
    
    public function editAdmin(Admin $admin) : void
    {
        $query=$this->db->prepare("UPDATE admin SET email = :email, password=:password");
        $parameters= [
            'id' => $admin->getId(),
            'email' =>$admin->getEmail(),
            'password' => $admin->getPassword(),
            ];
        $query->execute($parameters);
        $allAdmins=$query->fetch(PDO::FETCH_ASSOC);
    }
}
?>