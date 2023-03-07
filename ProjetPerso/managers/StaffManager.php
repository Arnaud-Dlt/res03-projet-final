<?php

// require 'managers/AbstractManager.php';
require 'models/Staff.php';

class StaffManager extends AbstractManager{
    
    public function getAllStaff() : array
    {
        $query=$this->db->prepare("SELECT * FROM staff");
        $query->execute();
        $getAllStaff=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabStaff=[];
        foreach($getAllStaff as $staff){
            $object=new Staff($staff['id'], $staff['firstname'],$staff['lastname'],$staff['phone'],$staff['role']);
            array_push($tabStaff, $object);
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
        $query=$this->db->prepare("INSERT INTO staff VALUES (null, :firstname, :lastname, :phone, :role)");
        $parameters= [
            'firstname' =>$staff->getFirstname(),
            'lastname' => $staff->getLastname(),
            'phone' => $staff->getPhone(),
            'role' => $staff->getRole()
            ];
        $query->execute($parameters);
    
        $getStaff=$query->fetch(PDO::FETCH_ASSOC);
    
        return $Staff;
    }
    public function editStaff(Staff $staff) : void
    {
        $query=$this->db->prepare("UPDATE staff SET firstname = :firstname, lastname=:lastname, phone=:phone, role=:role");
        $parameters= [
            'id' => $staff->getId(),
            'firstname' =>$staff->getFirstname(),
            'lastname' => $staff->getLastname(),
            'phone' => $staff->getPhone(),
            'role' => $staff->getRole()
            ];
        $query->execute($parameters);
        $allStaff=$query->fetch(PDO::FETCH_ASSOC);
    }
}


?>