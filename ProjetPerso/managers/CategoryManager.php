<?php

class CategoryManager extends AbstractManager{
    
    public function getAllCategories()
    {
        $query=$this->db->prepare("SELECT * FROM category");
        $query->execute();
        $getAllCategories=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabCategories=[];
        foreach($getAllCategories as $category){
            $object=new Category($category['name']);
            array_push($tabCategories, $object);
            $object->setId($category["id"]);
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
    
    public function insertCategory(Category $category) : Category
    {
        $query=$this->db->prepare("INSERT INTO category VALUES (null, :name)");
        $parameters= [
            'name' =>$category->getName(),
            ];
            
        $query->execute($parameters);
    
        $getCategory=$query->fetch(PDO::FETCH_ASSOC);
    
        return $category;
    }
    
    public function editCategory(Category $category) : void
    {
        $query=$this->db->prepare("UPDATE category SET name = :name WHERE category.id=:id");
        $parameters= [
            'name' =>$category->getName(),
            ];
        $query->execute($parameters);
        $allcategorys=$query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deletecategory(int $id) : void
    {
        $query=$this->db->prepare("DELETE FROM category WHERE id= :id");
        $parameters= [
            'id' => $id
            ];
        $query->execute($parameters);
    }
}
?>