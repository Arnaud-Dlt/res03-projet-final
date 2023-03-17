<?php

class ArticleManager extends AbstractManager{
    
    public function getAllArticles() : array
    {
        $query=$this->db->prepare("SELECT * FROM posts");
        $query->execute();
        $getAllArticles=$query->fetchAll(PDO::FETCH_ASSOC);
    
        $tabArticles=[];
        foreach($getAllArticles as $article){
            $object=new Article($article['first_name'],$article['last_name'],$article['phone'],$article['birthdate'],$article['position'],$article['foot'],$article['bio'],$article['profil_img'], $article['category_id']);
            array_push($tabArticles, $object);
            $object->setId($article["id"]);
        }
        
        return $tabArticles;
    }
    
    public function getArticleById(int $id) : Article
    {
        $query=$this->db->prepare("SELECT * FROM posts WHERE id= :id");
        $parameters= ['id' => $id];
        $query->execute($parameters);
        $getArticleById=$query->fetch(PDO::FETCH_ASSOC);
        $newArticle=new Article($getArticleById['title'],$getArticleById['description'],$getArticleById['content'],$getArticleById['picture']);
        
        $newArticle->setId($getArticleById["id"]);
        return $newArticle;
    }
    
    public function getArticleByDescription(string $description) : Article
    {
        $query=$this->db->prepare("SELECT * FROM posts WHERE description= :description");
        $parameters= ['description' => $description];
        $query->execute($parameters);
        $getArticleByDescription=$query->fetch(PDO::FETCH_ASSOC);
        $newArticle=new Article($getArticleByDescription['title'],$getArticleByDescription['description'],$getArticleByDescription['content'],$getArticleByDescription['picture']);
    
        return $newArticle;
    }
    
    public function insertArticle(Article $article) : Article
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
    
    public function editArticle(Article $article) : void
    {
        $query=$this->db->prepare("UPDATE posts SET first_name = :first_name, last_name=:last_name, phone=:phone, birthdate=:birthdate, position=:position, foot=:foot, bio=:bio, profil_img=:profil_img WHERE articles.id=:id");
        $parameters= [
            'first_name' =>$article->getFirstname(),
            'last_name' => $article->getLastname(),
            'phone' => $article->getPhone(),
            'birthdate' => $article->getBirthdate(),
            'position' => $article->getPosition(),
            'foot' => $article->getFoot(),
            'bio' => $article->getBio(),
            'profil_img' => $article->getProfilImg()
            ];
        $query->execute($parameters);
        $allArticles=$query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deleteArticle(int $id) : void
    {
        $query=$this->db->prepare("DELETE FROM posts WHERE id= :id");
        $parameters= [
            'id' => $id
            ];
        $query->execute($parameters);
    }

}


?>