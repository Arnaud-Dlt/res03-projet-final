<?php

class StaffManager extends AbstractManager{
    
    public function getAllStaff() : array
    {
        $query=$this->db->prepare("SELECT * FROM staff");
        $query->execute();
        $getAllStaff=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabStaff=[];
        foreach($getAllStaff as $staff){
            $object=new Staff($staff['first_name'],$staff['last_name'],$staff['phone'],$staff['role'],$staff['profil_img']);
            array_push($tabStaff, $object);
            $object->setId($staff["id"]);
        }
        return $tabStaff;
    }
    
    public function getStaffById(int $id) : Staff
    {
        $query=$this->db->prepare("SELECT * FROM staff WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getStaffById=$query->fetch(PDO::FETCH_ASSOC);
        $newStaff=new Staff($getStaffById['id'], $getStaffById['firstname'],$getStaffById['lastname'],$getStaffById['phone'],$getStaffById['role']);
    
        return $newStaff;
    }
    
    public function getStaffByRole(string $role) : Staff
    {
        $query=$this->db->prepare("SELECT * FROM staff WHERE role= :role");
        $parameters= ['role' => role];
        $query->execute($parameters);
        $getStaffByRole=$query->fetch(PDO::FETCH_ASSOC);
        $newStaff=new Staff($getStaffByRole['id'], $getStaffByRole['firstname'],$getStaffByRole['lastname'],$getStaffByRole['phone'],$getStaffByRole['role']);
    
        return $newStaff;
    }
    
    public function getStaffByFullname(string $name) : Staff
    {
        $query=$this->db->prepare("SELECT * FROM staff WHERE firstname= :firstname, lastname=:lastname");
        $parameters= ['firstname' => $firstname,'lastname' => $lastname];
        $query->execute($parameters);
        $getStaffById=$query->fetch(PDO::FETCH_ASSOC);
        $newStaff=new Staff($getStaffByRole['id'], $getStaffByRole['firstname'],$getStaffByRole['lastname'],$getStaffByRole['phone'],$getStaffByRole['role']);
    
        return $newStaff;
    }
    
    public function insertStaff(Staff $staff) : Staff
    {
        $query=$this->db->prepare("INSERT INTO staff VALUES (null, :first_name, :last_name, :phone, :role, :profil_img)");
        $parameters= [
            'first_name' =>$staff->getFirstname(),
            'last_name' => $staff->getLastname(),
            'phone' => $staff->getPhone(),
            'role' => $staff->getRole(),
            'profil_img'=>$staff->getProfilImg()
            ];
        $query->execute($parameters);
    
        $getStaff=$query->fetch(PDO::FETCH_ASSOC);
    
        return $staff;
    }
    
    public function editStaff(Staff $staff) : void
    {
        $query=$this->db->prepare("UPDATE staff SET first_name = :first_name, last_name=:last_name, phone=:phone, role=:role");
        $parameters= [
            'id' => $staff->getId(),
            'first_name' =>$staff->getFirstname(),
            'last_name' => $staff->getLastname(),
            'phone' => $staff->getPhone(),
            'role' => $staff->getRole()
            ];
        $query->execute($parameters);
        $allStaff=$query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deleteStaff(int $id) : void
    {
        $query=$this->db->prepare("DELETE FROM staff WHERE id= :id");
        $parameters= [
            'id' => $id
            ];
        $query->execute($parameters);
    }
}


?>