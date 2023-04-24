<?php

class CategoryController extends AbstractController{
    private CategoryManager $cm;
    
    public function __construct()
    {
        $this->categoryManager = new CategoryManager();
    }
    
    public function categories(){
        $this->publicRender("categories", []);
    }
    
    
    public function addCategory(array $post){
        
        if(isset($post["categoryName"]) && !empty($post["categoryName"])){
                
            $newCategory=new Category($post['categoryName']);
            
            $this->categoryManager->insertCategory($newCategory);
        }
    }
    
    public function deleteCategory(int $id){
        $this->categoryManager->deleteCategory($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-category");
    }
}
?>