<?php

class ArticleController extends AbstractController{
    private ArticleManager $articleManager;
    
    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    }
    
    // ARTICLES
    
    
    // Page tout les articles
    public function articles(){
        $this->publicRender("articles", ['articles'=>$this->articleManager->getAllArticles()]);
    }
    
    // Page article unique
    public function singleArticle(int $id){
        // recupération du l'id du joueur selectionné
        $displayArticleToShow = $this->articleManager->getArticleById($id);

        // stockage des infos du joueur
        $tab = [];
        $tab["article"] = $displayArticleToShow;
        
        // affichage de la page avec les infos du joueurs
        $this->publicRender("single-article", $tab);
    }
    
    
    // CRUD
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
    
    public function updateArticle(int $id, array $post){
        
        // recupération du l'id de l'article selectionné
        $displayArticleToUpdate = $this->articleManager->getArticleById($id);
        
        // stockage des infos de l'article 
        $tab = [];
        $tab["article"] = $displayArticleToUpdate;
        
        $this->privateRender("admin-post-edit", $tab);
        
        if(isset($post["articleEditTitle"]) && !empty($post["articleEditTitle"])
            && isset($post["articleEditDescription"]) && !empty($post["articleEditDescription"])
            && isset($post["articleEditContent"]) && !empty($post["articleEditContent"])
            && isset($post["articleEditPicture"]) && !empty($post["articleEditPicture"])){
            
            $postToUpdate=new Post($post['articleEditTitle'],$post['articleEditDescription'],$post['articleEditContent'],$post['articleEditPicture']);
            $postToUpdate->setId($id);
            var_dump($postToUpdate);
            
            $this->articleManager->updateArticle($postToUpdate);
        }
    }
    
    public function deleteArticle(int $id){
        $this->articleManager->deleteArticle($id);
        header("Location: /res03-projet-final/ProjetPerso/admin/admin-post");
    }
    
}


?>