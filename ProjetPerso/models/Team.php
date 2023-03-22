<?php 
class Team {
    private ? int $id;
    private string $name;
    private string $picture;
    private ?int $categoryId;
    
    public function __construct(string $name, string $picture, ?int $categoryId)
    {
        $this->id = null;
        $this->name = $name;
        $this->picture = $picture;
        $this->categoryId = $categoryId;
    }
    
    /// GETTER
    
    public function getId() : ? int
    {
        return $this->id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function getCategoryId() : ?int
    {
        return $this->categoryId;
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
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    public function setPicture(string $picture) : void
    {
        $this->picture = $picture;
    }
    
    public function setCategoryId(string $categoryId) : void
    {
        $this->categoryId = $categoryId;
    }
    
}

?>