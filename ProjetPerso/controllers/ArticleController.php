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
        $this->publicRender("articles", ['articles'=>$this->articleManager->getAllArticles()]);
    }
    
    
    public function addArticle(array $post){
        
        if(isset($post["articleTitle"]) && !empty($post["articleTitle"])
            && isset($post["articleDescription"]) && !empty($post["articleDescription"])
            && isset($post["articleContent"]) && !empty($post["articleContent"])
            && isset($post["articlePicture"]) && !empty($post["articlePicture"])){
                
            $newArticle=new Post($post['articleTitle'],$post['articleDescription'],$post['articleContent'],$post['articlePicture']);
            
            var_dump($newArticle);
            
            $this->articleManager->insertArticle($newArticle);
        }
        else if(isset($post["articleTitle"]) && empty($post["articleTitle"])){
            echo "Mettre un titre";
        }
        else if(isset($post["articleDescription"]) && empty($post["articleDescription"])){
            echo "Mettre une description";
        }
        else if(isset($post["articleContent"]) && empty($post["articleContent"])){
            echo "Mettre un contenu";
        }
    }
    
    public function deleteArticle(int $id){
        $this->articleManager->deleteArticle($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-articles");
    }
    
}


?>