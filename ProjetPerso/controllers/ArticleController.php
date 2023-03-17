<?php

class ArticleController extends AbstractController{
    private ArticleManager $articleManager;
    private MediaManager $mediaManager;
    
    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->mediaManager = new MediaManager();
    }
    
    // ARTICLES
    
    public function articles(){
        $this->publicRender("teams", []);
    }
    
    public function effectif(){
        $this->publicRender("effectif", []);
    }
    
    public function addArticle(array $post){
        
        if(isset($post["articleTitle"]) && !empty($post["articleTitle"])
            && isset($post["articleDescription"]) && !empty($post["articleDescription"])
            && isset($post["articleContent"]) && !empty($post["articleContent"])
            && isset($post["articlePicture"]) && !empty($post["articlePicture"])){
                
            $newArticle=new Article($post['articleTitle'],$post['articleDescription'],$post['articleContent'],$post['articlePicture']);
            
            $this->articleManager->insertArticle($newArticle);
        }
    }
    
    public function deleteArticle(int $id){
        $this->articleManager->deleteArticle($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-articles");
    }
    
}


?>