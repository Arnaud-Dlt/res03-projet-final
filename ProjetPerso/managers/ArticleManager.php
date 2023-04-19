<?php

class ArticleManager extends AbstractManager{
    
    public function getAllArticles() : array    /* Récuperer tous les articles */
    {
        $query=$this->db->prepare("SELECT * FROM posts");
        $query->execute();
        $getAllArticles=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabArticles=[];
        foreach($getAllArticles as $article){
            $object=new Post($article['title'],$article['description'],$article['content'],$article['picture']);
            array_push($tabArticles, $object);
            $object->setId($article["id"]);
        }
        
        return $tabArticles;
    }
    
    public function getArticleById(int $id) : Post
    {
        $query=$this->db->prepare("SELECT * FROM posts WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getArticleById=$query->fetch(PDO::FETCH_ASSOC);
        $newArticle=new Post($getArticleById['title'],$getArticleById['description'],$getArticleById['content'],$getArticleById['picture']);
        
        $newArticle->setId($getArticleById["id"]);
        return $newArticle;
    }
    
    public function getArticleByDescription(string $description) : Post
    {
        $query=$this->db->prepare("SELECT * FROM posts WHERE description= :description");
        $parameters= ['description' => $description];
        $query->execute($parameters);
        $getArticleByDescription=$query->fetch(PDO::FETCH_ASSOC);
        $newArticle=new Post($getArticleByDescription['title'],$getArticleByDescription['description'],$getArticleByDescription['content'],$getArticleByDescription['picture']);
    
        return $newArticle;
    }
    
    public function getLastFiveArticle(): array /* Recuperer le dernier article posté */
    {
        $query=$this->db->prepare("SELECT * FROM posts ORDER BY ID DESC LIMIT 5");
        $query->execute();
        $getLastPost=$query->fetchAll(PDO::FETCH_ASSOC);
        
        $tabLastArticles=[];
        foreach($getLastPost as $article){
            $object=new Post($article['title'],$article['description'],$article['content'],$article['picture']);
            array_push($tabLastArticles, $object);
            $object->setId($article["id"]);
        }
        return $tabLastArticles;
    }
    
    
    
    public function insertArticle(Post $article) : Post     /* Ajouter Article */
    {
        $query=$this->db->prepare("INSERT INTO posts VALUES (null, :title, :description, :content, :picture)");
        $parameters= [
            'title' =>$article->getTitle(),
            'description' => $article->getDescription(),
            'content' => $article->getContent(),
            'picture' => $article->getPicture(),
            ];
            
        $query->execute($parameters);
    
        $getArticle=$query->fetch(PDO::FETCH_ASSOC);
    
        return $article;
    }
    
    public function editArticle(Article $article) : void    /* Modifier Article */
    {
        $query=$this->db->prepare("UPDATE posts SET title=:title, description=:description, content=:content, picture=:picture WHERE articles.id=:id");
        $parameters= [
            'title' =>$article->getTitle(),
            'description' => $article->getDescription(),
            'content' => $article->getContent(),
            'picture' => $article->getPicture(),
            ];
        $query->execute($parameters);
        $allArticles=$query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deleteArticle(int $id) : void   /* Supprimer article */
    {
        $query=$this->db->prepare("DELETE FROM posts WHERE id= :id");
        $parameters= [
            'id' => $id
            ];
        $query->execute($parameters);
    }

}


?>