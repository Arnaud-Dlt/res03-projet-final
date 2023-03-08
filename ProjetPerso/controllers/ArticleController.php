<?php

class ArticleController extends AbstractController{
    private ArticleManager $am;
    private MediaManager $mm;
    
    public function __construct()
    {
        $this->am = new ArticleManager();
        $this->mm = new MediaManager();
    }
    
    // ARTICLES
    
    public function showArticles()
    {
        // get all the articles from the manager
        $articles=$this->am->getAllArticles();
        // render
        
        $articlesTab = [];
        foreach($articles as $article){
            $articleTab=$article->toArray();
            $articlesTab[]=$articleTab;
        }
        $this->render($articlesTab);
    }
    
    public function createArticle(array $post)
    {
        // create the article in the manager
        $article=new article(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
         // get the article from the manager
        $createArticle = $this->am->createArticle($article);
        // render the created article
        $createArticleTab = $createArticle->toArray();
        
        $this->render($createArticleTab);
    }

    public function updateArticle(array $post)
    {
        // update the article in the manager
        $article=new Article(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
        $updateArticle = $this->am->updateArticle($article);
        $updateArticleTab = $updateArticle->toArray();
        
        $this->render($updateArticleTab);
        // render the updated article
    }

    public function deleteArticle(array $post)
    {
        // delete the article in the manager
        $deleteArticle=new Article(null, $post['firstname'],$post['lastname'],$post['phone'],$post['birthdate'],$post['position'],$post['foot'],$post['bio'],$post['profilImg']);
        $deleteArticle = $this->am->deleteArticle($deleteArticle);
        $deleteArticleTab = $deleteArticle->toArray();
        
        $this->render($updateArticleTab);
        // render the list of all articles
    }
    
    // MEDIAS
    
    public function showMedias()
    {
        // get all the articles from the manager
        $medias=$this->mm->getAllMedias();
        // render
        
        $mediasTab = [];
        foreach($medias as $media){
            $mediaTab=$media->toArray();
            $mediasTab[]=$mediaTab;
        }
        $this->render($mediasTab);
    }
    
    public function createmedia(array $post)
    {
        // create the media in the manager
        $media=new Media(null, $post['name'],$post['championship']);
         // get the media from the manager
        $createMedia = $this->mm->createMedia($media);
        // render the created media
        $createMediaTab = $createMedia->toArray();
        
        $this->render($createMediaTab);
    }

    public function updateMedia(array $post)
    {
        // update the media in the manager
        $media=new Media(null, $post['name'],$post['championship']);
        $updateMedia = $this->mm->updateMedia($media);
        $updateMediaTab = $updateMedia->toArray();
        
        $this->render($updateMediaTab);
        // render the updated media
    }

    public function deleteMedia(array $post)
    {
        // delete the media in the manager
        $deleteMedia=new media(null, $post['name'],$post['championship']);
        $deleteMedia = $this->mm->deleteMedia($deleteMedia);
        $deleteMediaTab = $deleteMedia->toArray();
        
        $this->render($updateMediaTab);
        // render the list of all medias
    }
}


?>