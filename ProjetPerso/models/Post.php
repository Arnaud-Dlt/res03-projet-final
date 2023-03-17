<?php 
class Post {
    private ? int $id;
    private string $title;
    private string $description;
    private string $content;
    private string $picture;
    
    public function __construct(string $title, string $description, string $content, string $picture)
    {
        $this->id = null;
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->picture = $picture;
        
    }
    
    /// GETTER
    
    public function getId() : ? int
    {
        return $this->id;
    }
    
    public function getTitle() : string
    {
        return $this->title;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }
    
    public function getContent() : string
    {
        return $this->content;
    }
    public function getPicture() : string
    {
        return $this->picture;
    }
    
    /// SETTER
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setTitle(string $title) : void
    {
        $this->title = $Title;
    }
    
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
    public function setContent(string $content) : void
    {
        $this->content = $content;
    }
    
    public function setPicture(string $picture) : void
    {
        $this->picture = $picture;
    }
}

?>