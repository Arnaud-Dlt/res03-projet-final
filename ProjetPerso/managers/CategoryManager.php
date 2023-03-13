<?php

class CategoryManager extends AbstractManager{
    
    public function getAllCategories()
    {
        $query=$this->db->prepare("SELECT * FROM category");
        $query->execute();
        $getAllCategories=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabCategorys=[];
        foreach($getAllCategories as $Category){
            $object=new Category($Category['id'], $Category['firstname'],$Category['lastname'],$Category['phone'],$Category['birthdate'],$Category['position'],$Category['foot'],$Category['bio'],$Category['profilImg']);
            array_push($tabCategories, $object);
        }
        return $tabCategories;
    }
    
    public function getCategoryById(int $id) : Category
    {
        $query=$this->db->prepare("SELECT * FROM category WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getCategoryById=$query->fetch(PDO::FETCH_ASSOC);
        $newCategory=new Category($getCategoryById['id'], $getCategoryById['name']);
    
        return $newCategory;
    }
    
    public function getCategoryByName(string $name) : Category
    {
        $query=$this->db->prepare("SELECT * FROM category WHERE name= :name");
        $parameters= ['name' => $name];
        $query->execute($parameters);
        $getCategoryByName=$query->fetch(PDO::FETCH_ASSOC);
        $newCategory=new Category($getCategoryByName['id'], $getCategoryByName['name']);
    
        return $newCategory;
    }
}
?>